
<!DOCTYPE html>
<html>
  <head>
    <script src="https://unpkg.com/konva@3.2.4/konva.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js">
      </script>
    <meta charset="utf-8" />
    <title>Konva Load Complex Stage Demo</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #f0f0f0;
      }
    </style>
  </head>
  <body>
    <button id="create-seat">Create Seat</button>
    <button id="create-Hline">Create Partition-H</button>
    <button id="create-Vline">Create Partition-V</button>
    <button id="create-conference">Create Conference</button>
    <button id="undo">Undo</button>
    <button id="redo">Redo</button>
    <button id="save" type="submit">Save</button>
    
    <div id="container"></div>


    <script>
      var possibleFilters = ['', 'blur', 'invert'];

      function createObject(attrs) {
        return Object.assign({}, attrs, {
          // define position
          x: 0,
          y: 0,
          // here should be url to image
          src: '',
          // and define filter on it, let's define that we can have only
          // "blur", "invert" or "" (none)
          filter: 'blur'
        });
      }
     
      
      //<img src="smiley.gif" alt="Smiley face" height="42" width="42">

      function createSeat(attrs) {

        return Object.assign(createObject(attrs),
         {
          name: 'seat',
          src: '/img/backend/television.png'
        });
      }
       function createPartition_H(attrs) {
        return Object.assign(createObject(attrs), {
          name:'table',
          src: '/img/backend/table1.jpg'
        });
      }

       function createPartition_V(attrs) {
        return Object.assign(createObject(attrs), {
          name: 'Vline',
          src: '/img/backend/verticalLine.jpg'
        });
      }

      function createConference(attrs) {
        return Object.assign(createObject(attrs), {
          name: 'conference',
          src: '/img/backend/conference2.png'
        });
      }

      // initial state
      var state = [createSeat({ x: 50, y: 50 })];
      var x=0;
      var seats=new Array();
      var table1=new Array();


      // our history
      var appHistory = [state];
      var appHistoryStep = 0;

      var width = window.innerWidth;
      var height = window.innerHeight;
      var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height
      });

      var layer = new Konva.Layer();
      stage.add(layer);
      
      // create function will destroy previous drawing
      // then it will created required nodes and attach all events
      function create() {
        layer.destroyChildren();
        x=0;
        state.forEach((item, index) => {
          
          var node = new Konva.Image({
            draggable: true,
            name: 'item-' + index,
            id:item.name+ ++x,
            // make it smaller
            scaleX: 0.5,
            scaleY: 0.5
          });
          layer.add(node);

          node.on('dragend', () => {
            // make new state
            state = state.slice();
            // update object data
            state[index] = Object.assign({}, state[index], {
              x: node.x(),
              y: node.y()
            });

            // save it into history
            saveStateToHistory(state);

            // don't need to call update here
            // because changes already in node
          });

          node.on('click', () => {
            // find new filter
            var oldFilterIndex = possibleFilters.indexOf(state[index].filter);
            var nextIndex = (oldFilterIndex + 1) % possibleFilters.length;
            var filter = possibleFilters[nextIndex];

            // apply state changes
            state = state.slice();
            state[index] = Object.assign({}, state[index], {
              filter: filter
            });
            // save state to history
            saveStateToHistory(state);
            // update canvas from state
            update(state);
          });

          var img = new window.Image();
          img.onload = function() {
            node.image(img);
           update(state);
            layer.batchDraw();
          };
          img.src = item.src;
        });
        update(state);
      }

      function update() {
        state.forEach(function(item, index) {  
          var node = stage.findOne('.item-' + index);
          node.setAttrs({
            x: item.x,
            y: item.y
          });

          if (!node.image()) {
            return;
          }
          if (item.filter === 'blur') {
            node.filters([Konva.Filters.Blur]);
            node.blurRadius(10);
            node.cache();
          } else if (item.filter === 'invert') {
            node.filters([Konva.Filters.Invert]);
            node.cache();
          } else {
            node.filters([]);
            node.clearCache();
          }

        // function a(item, index)
        // {
        //   if (item.name === 'seat') {
        //     var s=seats.push(item.name);
        //     console.log(s);
        //   } 
        //   else if (item.id=="table1") {
        //     var st=table1.push(item.id);

        //     console.log(st);
        //   } 
        //   else{
        //     console.log("hello");
        //   }
        // }
        });

        layer.batchDraw();
      }

      
      function saveStateToHistory(state) {
        appHistory = appHistory.slice(0, appHistoryStep + 1);
        appHistory = appHistory.concat([state]);
        appHistoryStep += 1;
      }
      create(state);

      document
        .querySelector('#create-seat')
        .addEventListener('click', function() {
          // create new object
          state.push(
            createSeat({
              x: width * Math.random(),
              y: height * Math.random()
            })
          );
          // recreate canvas
          create(state);
        });


      //   function downloadURI(uri, name) {
      //   var link = document.createElement('a');
      //   link.download = name;
      //   link.href = uri;
      //   document.body.appendChild(link);
      //   link.click();
      //   document.body.removeChild(link);
      //   delete link;
      // }

      
        document
        .querySelector('#save')
        .addEventListener('click', function()
        {
          var dataURL = stage.toDataURL();
          //downloadURI(dataURL, 'stage.png');
          var jsonData = stage.toJSON();
          console.log(jsonData);
        

        var payload = {
          jsonData : jsonData,
          _token: '{{ csrf_token() }}'
        };
    //event.preventDefault();
    $.ajax({
        //url:'/Backend/Floor/Floors/store',
        url: '{{ route('admin.floors.store') }}',
        type: 'post',
        data: payload, // Remember that you need to have your csrf token included
        dataType: 'json',
     //    .done(function(response) {
     // // Make sure that the formMessages div has the 'success' class.
     // formMessages.removeClass('alert-danger');
     //    formMessages.addClass('alert-success');
     //    })
    });
  });
       

        document
        .querySelector('#create-Hline')
        .addEventListener('click', function() {
          // create new object
          state.push(
            createPartition_H({
              x: width * Math.random(),
              y: height * Math.random()
            })
          );
          // recreate canvas
          create(state);
        });

         document
        .querySelector('#create-Vline')
        .addEventListener('click', function() {
          // create new object
          state.push(
            createPartition_V({
              x: width * Math.random(),
              y: 100,
            })
          );
          // recreate canvas
          create(state);
        });




      document
        .querySelector('#create-conference')
        .addEventListener('click', function() {
          // create new object
          state.push(
            createConference({
              x: width * Math.random(),
              y: height * Math.random()
            })
          );
          // recreate canvas
          create(state);
        });

      document.querySelector('#undo').addEventListener('click', function() {
        if (appHistoryStep === 0) {
          return;
        }
        appHistoryStep -= 1;
        state = appHistory[appHistoryStep];
        // create everything from scratch
        create(state);
      });

      document.querySelector('#redo').addEventListener('click', function() {
        if (appHistoryStep === appHistory.length - 1) {
          return;
        }
        appHistoryStep += 1;
        state = appHistory[appHistoryStep];
        // create everything from scratch
        create(state);
      });
    </script>
  </body>
</html>