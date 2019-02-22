<?php

namespace App\Http\Controllers\Frontend\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactUs\CreateContactUsRequest;
use App\Http\Requests\Frontend\ContactUs\DeleteContactUsRequest;
use App\Http\Requests\Frontend\ContactUs\EditContactUsRequest;
use App\Http\Requests\Frontend\ContactUs\ManageContactUsRequest;
use App\Http\Requests\Frontend\ContactUs\StoreContactUsRequest;
use App\Http\Requests\Frontend\ContactUs\UpdateContactUsRequest;
use App\Http\Responses\Frontend\Faq\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\ContactUs\Faq;
use App\Repositories\Frontend\ContactUs\ContactUsRepository;

class ContactUsController extends Controller
{
    /**
     * Faq Repository.
     *
     * @var \App\Repositories\Frontend\ContactUs\ContactUsRepository
     */
    protected $faq;

    /**
     * @param \App\Repositories\Frontend\ContactUs\ContactUsRepository $faq
     */
    public function __construct(ContactUsRepository $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\Frontend\ContactUs\ManageContactUsRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageContactUsRequest $request)
    {
        return new ViewResponse('Frontend.ContactUs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Http\Requests\Frontend\ContactUs\CreateContactUsRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreateContactUsRequest $request)
    {
        return new ViewResponse('Frontend.ContactUs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Frontend\ContactUs\StoreContactUsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreContactUsRequest $request)
    {
        $this->faq->create($request->all());

        return new RedirectResponse(route('user.ContactUs.index'), ['flash_success' => trans('alerts.Frontend.ContactUs.created')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ContactUs\Faq                            $faq
     * @param \App\Http\Requests\Frontend\ContactUs\EditContactUsRequest $request
     *
     * @return \App\Http\Responses\Frontend\Faq\EditResponse
     */
    public function edit(Faq $faq, EditContactUsRequest $request)
    {
        return new EditResponse($faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Frontend\ContactUs\UpdateContactUsRequest $request
     * @param \App\Models\ContactUs\Faq                              $id
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateContactUsRequest $request, Faq $faq)
    {
        $this->faq->update($faq, $request->all());

        return new RedirectResponse(route('user.ContactUs.index'), ['flash_success' => trans('alerts.Frontend.ContactUs.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ContactUs\Faq                              $faq
     * @param \App\Http\Requests\Frontend\ContactUs\DeleteContactUsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Faq $faq, DeleteContactUsRequest $request)
    {
        $this->faq->delete($faq);

        return new RedirectResponse(route('user.ContactUs.index'), ['flash_success' => trans('alerts.Frontend.ContactUs.deleted')]);
    }
}
