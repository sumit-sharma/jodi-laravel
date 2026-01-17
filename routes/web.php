<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerUploadController;
use App\Http\Controllers\Panel\AdvtdataController;
use App\Http\Controllers\Panel\AppointmentController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\DataController;
use App\Http\Controllers\Panel\EmployeeController;
use App\Http\Controllers\Panel\EnquiryController;
use App\Http\Controllers\Panel\FeedbackController;
use App\Http\Controllers\Panel\FixMemberController;
use App\Http\Controllers\Panel\FollowupController;
use App\Http\Controllers\Panel\FormTransferController;
use App\Http\Controllers\Panel\HoldMemberController;
use App\Http\Controllers\Panel\MasterController;
use App\Http\Controllers\Panel\MatchController;
use App\Http\Controllers\Panel\ReferenceController;
use App\Http\Controllers\Panel\SearchController;
use App\Http\Controllers\Panel\SendMailController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthController::class, "showLogin"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
});

Route::get('/', RedirectController::class);

Route::get('/uploads/customer/{filename}', [CustomerUploadController::class, 'show'])
    ->where('filename', '.*'); // allow dots in filename



Route::middleware("auth")->group(function () {
    Route::post('/cache-clear', [DashboardController::class, 'cacheClear'])->name('cache-clear');
    Route::any("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/fetch-customer-data/{rno}', [DashboardController::class, 'fetchCustomerData'])->name('fetch-customer-data');

    Route::get('/customer-photos/{rno}', [CustomerController::class, 'showPhotos'])->name('customer.show-photos');
    Route::get('/uplod-photo/{rno}', [CustomerController::class, 'uplodPics'])->name('customer.uplod-photo');
    Route::delete('/delete-customer-photo', [CustomerController::class, 'deleteFile'])->name('customer.photo-delete');
    Route::post('/customer-upload', [CustomerController::class, 'upload'])->name('customer.upload');
    Route::get('/customer/picklistbiodata', [CustomerController::class, 'pickListBioData'])->name('customer.picklistbiodata');
    Route::get('/customer/picklist-viewprofile-data', [CustomerController::class, 'pickListViewProfileData'])->name('customer.picklist-viewprofile-data');
    Route::resource('customer', CustomerController::class);

    Route::get('/dashboard/get-castes/{religion}', [DashboardController::class, 'getCaste'])->name('get-caste');
    Route::get('/dashboard/fetch-castes', [DashboardController::class, 'fetchCastes'])->name('fetch-castes');
    Route::get('/dashboard/fetch-distinct-data', [DashboardController::class, 'getDistinctData'])->name('fetch-distinct-data');
    Route::get('/dashboard/fetch-table-data', [DashboardController::class, 'getTableData'])->name('fetch-table-data');

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::post('/appointment', [AppointmentController::class, 'saveAppointment'])->name('appointment.save');

    Route::any('/find-match/{rno?}', [MatchController::class, 'findMatch'])->name('panel.find-match');
    Route::any('/search-match', [MatchController::class, 'searchMatch'])->name('panel.search-match');
    Route::post('/save-client-sl', [MatchController::class, 'saveClientSL'])->name('save-client-sl');
    Route::put('/update-client-sl/{id}', [MatchController::class, 'updateClientSL'])->name('update-client-sl');
    Route::get('/client-sl-list/{rno}', [MatchController::class, 'clientSLList'])->name('client-sl-list');

    Route::prefix('services')->group(function () {
        Route::get('/search-members', [SearchController::class, 'searchMembers'])->name('seach-members');
        Route::any('/search-result', [SearchController::class, 'searchData'])->name('search-data');
    });

    Route::prefix('main')->group(function () {
        Route::get('/manage-caste', [MasterController::class, 'viewCasteManager'])->name('manage-caste');
        Route::post('/store-caste', [MasterController::class, 'storeCaste'])->name('panel.caste-options.store');
        Route::any('/check-exist', [MasterController::class, 'checkExists'])->name('panel.check-exist');
        Route::get('/manage-zone', [MasterController::class, 'viewZoneManager'])->name('manage-zone');
        Route::post('/store-zone', [MasterController::class, 'storeZone'])->name('panel.store-zone');
        Route::get('/manage-occupation', [MasterController::class, 'viewOccupationManager'])->name('manage-occupation');
        Route::post('/store-occupation', [MasterController::class, 'storeOccupation'])->name('panel.store-occupation');
        Route::get('/get-active-employee', [MasterController::class, 'getActiveEmployee'])->name('panel.get-active-employee');
        Route::get('/change-password', [MasterController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [MasterController::class, 'changePasswordStore'])->name('panel.change-password');
        Route::get('/link-tl-tc', [MasterController::class, 'linkTlTc'])->name('link-tl-tc');
    });

    Route::resource('references', ReferenceController::class);

    Route::get('/pdfview/{type}/{rno}', [DashboardController::class, 'pdfview'])->name('pdfview');

    Route::get('/update-match-prefrence/{rno}', [MatchController::class, 'viewUpdateMatchPrefrences'])->name('update-match-prefrence');
    Route::post('/save-match-prefrences/{rno}', [MatchController::class, 'saveMatchPrefrences'])->name('save-match-prefrences');

    Route::get('/update-more-info/{rno}', [CustomerController::class, 'UpdateMoreInfo'])->name('update-more-info');
    Route::post('/save-more-info', [CustomerController::class, 'saveMoreInfo'])->name('save-more-info');
    Route::get('/view-more-info/{rno}', [CustomerController::class, 'ViewMoreInfo'])->name('view-more-info');

    Route::post('/get-meeting_by', [CustomerController::class, 'getMeetingBy'])->name('get-meeting_by');
    Route::post('/save-meeting', [CustomerController::class, 'storeMeeting'])->name('save-meeting');
    Route::get('/meeting-list/{rno}', [CustomerController::class, 'meetingList'])->name('meeting-list');

    Route::post('/save-interaction', [CustomerController::class, 'storeInteraction'])->name('save-interaction');
    Route::get('/interaction-list/{rno}', [CustomerController::class, 'interactionList'])->name('interaction-list');
    Route::put('/interaction/toggle-bookmark', [CustomerController::class, 'toggleBookmarkInteraction'])->name('interaction.toggle-bookmark');
    Route::delete('/interaction/delete-interaction', [CustomerController::class, 'destroyInteraction'])->name('interaction.delete-interaction');

    Route::get('/enquiry-list/{rno}', [EnquiryController::class, 'enquiryList'])->name('enquiry-list');
    Route::post('/save-enquiry', [EnquiryController::class, 'store'])->name('save-enquiry');
    Route::get('/customer-enquiry/{rno}', [EnquiryController::class, 'show'])->name('get-enquiry');
    Route::put('/update-enquiry/{id}', [EnquiryController::class, 'update'])->name('update-enquiry');
    Route::get('/all-enquiries', [EnquiryController::class, 'index'])->name('all-enquiries');
    // Route::delete('/delete-enquiry/{id}', [EnquiryController::class, 'destroy'])->name('delete-enquiry');

    Route::get('/fetch-images/{rno}', [CustomerController::class, 'fetchImages'])->name('fetch-images');
    Route::get('/sendmail-list/{rno}', [SendMailController::class, 'listSendMail'])->name('sendmail-list');
    Route::get('/sendmail/{rno}', [SendMailController::class, 'index'])->name('sendmail.index');
    Route::post('/sendmail', [SendMailController::class, 'store'])->name('sendmail.store');
    Route::get('/sendmail/show/{id}', [SendMailController::class, 'show'])->name('sendmail.show');

    Route::get('/feedback/{rno}', [FeedbackController::class, 'feedbackList'])->name('feedback');
    Route::get('/fetch-feedback/{type}/{rno}', [FeedbackController::class, 'fetchFeedbackByType'])->name('fetch-feedback');
    Route::post('/save-feedback', [FeedbackController::class, 'store'])->name('save-feedback');

    Route::post('/save-fix-member', [FixMemberController::class, 'store'])->name('save-fix-member');
    Route::get('/check-fix-member/{rno}', [FixMemberController::class, 'checkFixMember'])->name('check-fix-member');
    Route::get('/fix-member', [FixMemberController::class, 'index'])->name('fix-member.index');
    Route::put('/update-fix-active-job/{action}/{rno}', [FixMemberController::class, 'updateFixActiveJob'])->name('update-fix-active-job');


    Route::get('/hold-member-list', [HoldMemberController::class, 'index'])->name('hold-member.index');
    Route::post('/save-hold-member', [HoldMemberController::class, 'store'])->name('save-hold-member');
    Route::get('/check-hold-member/{rno}', [HoldMemberController::class, 'checkHoldMember'])->name('check-hold-member');
    Route::get('/show-all-hold-records', [HoldMemberController::class, 'showAllHoldRecords'])->name('show-all-hold-records');



    Route::get('/fetch-tctlrm-member/{rno}', [CustomerController::class, 'fetchTctlrmMember'])->name('fetch-tctlrm-member');
    Route::post('/edit-tctlrm-member', [CustomerController::class, 'editTctlrmMember'])->name('edit-tctlrm-member');

    Route::put('/toggle-visited/{rno}', [CustomerController::class, 'toggleVisited'])->name('toggle-visited');
    Route::put('/toggle-oc/{rno}', [CustomerController::class, 'toggleOC'])->name('toggle-oc');

    Route::put('/toggle-classified/{rno}', [CustomerController::class, 'toggleClassified'])->name('toggle-classified');
    Route::get('/get-classified/{rno}', [CustomerController::class, 'getClassified'])->name('get-classified');

    Route::put('/toggle-non-active/{rno}', [CustomerController::class, 'toggleNonActive'])->name('toggle-non-active');

    Route::get('/my-followup', [FollowupController::class, 'index'])->name('my-followup');
    Route::get('/fetch-followup/{rno}', [FollowupController::class, 'show'])->name('fetch-followup');
    Route::post('/save-followup', [FollowupController::class, 'store'])->name('save-followup');
    Route::get('/check-limit', [FollowupController::class, 'checkLimit'])->name('check-limit');

    Route::post('/save-form-transfer', [FormTransferController::class, 'store'])->name('save-form-transfer');

    Route::get('/show-all-rm-data', [EmployeeController::class, 'showAllRmData'])->name('show-all-rm-data');

    Route::get('/list-advtdata', [AdvtdataController::class, 'index'])->name('list-advtdata');
    Route::get('/add-advtdata', [AdvtdataController::class, 'create'])->name('add-advtdata');
    Route::post('/save-advtdata', [AdvtdataController::class, 'store'])->name('save-advtdata');

    Route::get('/show-all-other-data', [DataController::class, 'showallotherdata'])->name('show-all-other-data');
    Route::get('/show-website-data', [DataController::class, 'showwebsiteData'])->name('show-website-data');
    Route::get('/show-done-list', [DataController::class, 'showdoneList'])->name('show-done-list');
    Route::get('/show-all-nadata', [DataController::class, 'showmyNaData'])->name('show-all-nadata');
    Route::get('/show-all-non-nadata', [DataController::class, 'showallnonnadata'])->name('show-all-non-nadata');
});
