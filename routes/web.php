<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerUploadController;
use App\Http\Controllers\Panel\AdvtdataController;
use App\Http\Controllers\Panel\AppointmentController;
use App\Http\Controllers\Panel\ChatController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\DailyMomentController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\DataController;
use App\Http\Controllers\Panel\EmployeeController;
use App\Http\Controllers\Panel\EnquiryController;
use App\Http\Controllers\Panel\FeedbackController;
use App\Http\Controllers\Panel\FixMemberController;
use App\Http\Controllers\Panel\FollowupController;
use App\Http\Controllers\Panel\FormTransferController;
use App\Http\Controllers\Panel\FreshCallController;
use App\Http\Controllers\Panel\HideMemberController;
use App\Http\Controllers\Panel\HoldMemberController;
use App\Http\Controllers\Panel\MasterController;
use App\Http\Controllers\Panel\MatchController;
use App\Http\Controllers\Panel\ReferenceController;
use App\Http\Controllers\Panel\ReportController;
use App\Http\Controllers\Panel\SearchController;
use App\Http\Controllers\Panel\SendMailController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthController::class, "showLogin"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
});

Route::get('/', RedirectController::class);

Route::get('/uploads/customer/{filename}', [CustomerUploadController::class, 'show'])
    ->where('filename', '.*'); // allow dots in filename



Route::middleware("auth")->group(function () {
    Route::post('confirm-password', [AuthController::class, 'confirmPassword'])->name('confirm-password');

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
    Route::resource('customer', CustomerController::class)->except(['destroy']);
    Route::post('delete-customer', [CustomerController::class, 'destroy'])->name('customer.delete');

    Route::get('/dashboard/get-castes/{religion}', [DashboardController::class, 'getCaste'])->name('get-caste');
    Route::get('/dashboard/fetch-castes', [DashboardController::class, 'fetchCastes'])->name('fetch-castes');
    Route::get('/dashboard/fetch-distinct-data', [DashboardController::class, 'getDistinctData'])->name('fetch-distinct-data');
    Route::get('/dashboard/fetch-table-data', [DashboardController::class, 'getTableData'])->name('fetch-table-data');

    Route::get('/appointment-report', [AppointmentController::class, 'appointmentReport'])->name('appointment-report.index')->middleware('permission:Appointment Report');
    Route::post('/appointment-report', [AppointmentController::class, 'appointmentReportStore'])->name('appointment-report.store');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index')->middleware('permission:Show All Appointment');
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

        Route::middleware('permission:Add Options')->group(function () {
            Route::get('/feedback-option', [MasterController::class, 'feedbackOption'])->name('feedback-option');
            Route::post('/feedback-option', [MasterController::class, 'feedbackOptionStore'])->name('panel.feedback-option');

            Route::get('/manage-occupation', [MasterController::class, 'viewOccupationManager'])->name('manage-occupation');
            Route::post('/store-occupation', [MasterController::class, 'storeOccupation'])->name('panel.store-occupation');

            Route::get('/manage-caste', [MasterController::class, 'viewCasteManager'])->name('manage-caste');
            Route::post('/store-caste', [MasterController::class, 'storeCaste'])->name('panel.caste-options.store');

            Route::get('/manage-zone', [MasterController::class, 'viewZoneManager'])->name('manage-zone');
            Route::post('/store-zone', [MasterController::class, 'storeZone'])->name('panel.store-zone');
        });
        Route::middleware('permission:Update Timmings')->group(function () {
            Route::get('/update-timings', [MasterController::class, 'timings'])->name('update-timings');
            Route::post('/update-timings', [MasterController::class, 'timingsStore'])->name('panel.update-timings');
        });

        Route::any('/check-exist', [MasterController::class, 'checkExists'])->name('panel.check-exist');
        Route::post('/check-mobiles', [MasterController::class, 'checkMobiles'])->name('panel.check-mobiles');
        Route::get('/get-active-employee', [MasterController::class, 'getActiveEmployee'])->name('panel.get-active-employee');
        Route::get('/change-password', [MasterController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [MasterController::class, 'changePasswordStore'])->name('panel.change-password');
        Route::get('/link-tl-tc', [MasterController::class, 'linkTlTc'])->name('link-tl-tc')->middleware('permission:Link TL-TC');
        Route::post('/link-tl-tc', [MasterController::class, 'linkTlTcStore'])->name('panel.link-tl-tc');
        Route::get('/rm-transfer', [MasterController::class, 'rmTransfer'])->name('rm-transfer')->middleware('permission:Transfer RM/TC');
        Route::post('/rm-transfer', [MasterController::class, 'rmTransferStore'])->name('panel.rm-transfer');
        Route::get('/tc-transfer', [MasterController::class, 'tcTransfer'])->name('tc-transfer');
        Route::post('/tc-transfer', [MasterController::class, 'tcTransferStore'])->name('panel.tc-transfer');


        Route::get('/update-my-info', [MasterController::class, 'myInfo'])->name('update-my-info');
        Route::post('/update-my-info', [MasterController::class, 'myInfoUpdate'])->name('panel.update-my-info');

        Route::get('/reset-password', [MasterController::class, 'resetPassword'])->name('reset-password');
        Route::post('/reset-password', [MasterController::class, 'resetPasswordStore'])->name('panel.reset-password');
        Route::put('password-regenerate/{username}', [EmployeeController::class, 'passwordRegenerate'])->name('password-regenerate');
        Route::put('toggle-employee-status/{username}', [EmployeeController::class, 'toggleEmployeeStatus'])->name('toggle-employee-status');
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

    Route::get('/all-enquiries', [EnquiryController::class, 'index'])->name('all-enquiries')->middleware('permission:Update all Enquiry');

    // Route::delete('/delete-enquiry/{id}', [EnquiryController::class, 'destroy'])->name('delete-enquiry');

    Route::get('/fetch-images/{rno}', [CustomerController::class, 'fetchImages'])->name('fetch-images');
    Route::get('/sendmail-list/{rno}', [SendMailController::class, 'listSendMail'])->name('sendmail-list');
    Route::get('/sendmail/{rno}', [SendMailController::class, 'index'])->name('sendmail.index');
    Route::post('/sendmail', [SendMailController::class, 'store'])->name('sendmail.store');
    Route::get('/sendmail/show/{id}', [SendMailController::class, 'show'])->name('sendmail.show');
    Route::get('/pending-mails', [SendMailController::class, 'pendingmails'])->name('pending-mails');
    Route::get('/send-self-profile', [SendMailController::class, 'selfprofile'])->name('send-self-profile');
    Route::post('/send-self-profile', [SendMailController::class, 'selfprofileStore'])->name('panel.send-self-profile');

    Route::get('/feedback/{rno}', [FeedbackController::class, 'feedbackList'])->name('feedback');
    Route::get('/fetch-feedback/{type}/{rno}', [FeedbackController::class, 'fetchFeedbackByType'])->name('fetch-feedback');
    Route::post('/save-feedback', [FeedbackController::class, 'store'])->name('save-feedback');
    Route::get('/get-feedback-modal/{rno}', [FeedbackController::class, 'getFeedbackModal'])->name('get-feedback-modal');

    Route::post('/save-fix-member', [FixMemberController::class, 'store'])->name('save-fix-member');
    Route::get('/check-fix-member/{rno}', [FixMemberController::class, 'checkFixMember'])->name('check-fix-member');
    Route::get('/fix-member', [FixMemberController::class, 'index'])->name('fix-member.index')->middleware('permission:Fix / Active Member');
    Route::put('/update-fix-active-job/{action}/{rno}/{pk?}', [FixMemberController::class, 'updateFixActiveJob'])->name('update-fix-active-job');


    Route::get('/hold-member-list', [HoldMemberController::class, 'index'])->name('hold-member.index');
    Route::post('/save-hold-member', [HoldMemberController::class, 'store'])->name('save-hold-member');
    Route::get('/check-hold-member/{rno}', [HoldMemberController::class, 'checkHoldMember'])->name('check-hold-member');
    Route::get('/show-all-hold-records', [HoldMemberController::class, 'showAllHoldRecords'])->name('show-all-hold-records');

    Route::get('/hide-member-list', [HideMemberController::class, 'index'])->name('hide-member.index');
    Route::put('/toggle-hide-member/{rno}', [HideMemberController::class, 'update'])->name('toggle-hide-member');
    Route::get('/check-hide-status/{rno}', [HideMemberController::class, 'show'])->name('check-hide-status');

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
    Route::get('/transfer-all-followups', [FollowupController::class, 'transferFollowups'])->name('transfer-all-followups')->middleware('permission:Transfer Followup');
    Route::post('/transfer-all-followups', [FollowupController::class, 'transferFollowupsStore'])->name('panel.transfer-all-followups')->middleware('permission:Transfer Followup');
    Route::get('/followup-records', [FollowupController::class, 'followUpRecords'])->name('followup-records');

    Route::middleware('permission:Form Transfer')->group(function () {
        Route::get('/all-form-transfer', [FormTransferController::class, 'index'])->name('all-form-transfer');
        Route::post('/save-form-transfer', [FormTransferController::class, 'store'])->name('save-form-transfer');
    });

    Route::get('/fresh-call', [FreshCallController::class, 'create'])->name('fresh-call');
    Route::post('/save-fresh-call', [FreshCallController::class, 'store'])->name('save-fresh-call');

    Route::get('/show-all-rm-data', [EmployeeController::class, 'showAllRmData'])->name('show-all-rm-data');

    Route::get('/list-advtdata', [AdvtdataController::class, 'index'])->name('list-advtdata')->middleware('permission:View All Advt Data');
    Route::get('/add-advtdata', [AdvtdataController::class, 'create'])->name('add-advtdata');
    Route::post('/save-advtdata', [AdvtdataController::class, 'store'])->name('save-advtdata');

    Route::get('/show-all-other-data', [DataController::class, 'showallotherdata'])->name('show-all-other-data');
    Route::get('/show-website-data', [DataController::class, 'showwebsiteData'])->name('show-website-data');
    Route::get('/show-done-list', [DataController::class, 'showdoneList'])->name('show-done-list');
    Route::get('/show-all-nadata', [DataController::class, 'showmyNaData'])->name('show-all-nadata');
    Route::get('/show-all-non-nadata', [DataController::class, 'showallnonnadata'])->name('show-all-non-nadata');

    Route::get('/daily-moment', [DailyMomentController::class, 'index'])->name('daily-moment.index')->middleware('permission:All Daily Moment');
    Route::post('/save-daily-moment', [DailyMomentController::class, 'store'])->name('save-daily-moment');
    Route::post('/add-attendance', [EmployeeController::class, 'addAttendance'])->name('add-attendance');
    Route::get('/get-attendance/{empid}/{dated}', [EmployeeController::class, 'getAttendance'])->name('get-attendance');
    Route::get('/add-reminder', [EmployeeController::class, 'addReminder'])->name('add-reminder');
    Route::get('/show-reminders', [EmployeeController::class, 'showReminders'])->name('show-reminders');
    Route::post('/store-message', [EmployeeController::class, 'storeMessage'])->name('store-message');

    Route::any('/get-counter-number', [MasterController::class, 'getCounterNumber'])->name('get-counter-number');
    Route::post('/convert-member', [CustomerController::class, 'convertMember'])->name('convert-member');
    Route::get('/sent-package', [DataController::class, 'sentpackage'])->name('sent-package')->middleware('permission:Edit All Data');
    Route::get('/wrong-email', [DataController::class, 'wrongemail'])->name('wrong-email');
    Route::get('/web-data', [DataController::class, 'webdata'])->name('web-data')->middleware('permission:Show Web Data');
    Route::put('/toggle-web-data/{id}', [DataController::class, 'toggleWebData'])->name('toggle-web-data');
    Route::get('/print-request', [EmployeeController::class, 'printRequestList'])->name('print-request')->middleware('permission:Print Job Approval');
    Route::put('/approve-reject-print-job', [EmployeeController::class, 'approveRejectPrintJob'])->name('approve-reject-print-job');

    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/meeting-report', [ReportController::class, 'meetingReport'])->name('meeting-report');
        Route::get('/no-touch-report', [ReportController::class, 'noTouchReport'])->name('no-touch-report')->middleware('permission:No Touch Client');
        Route::get('/attendance-report', [ReportController::class, 'attendanceReport'])->name('attendance-report')->middleware('permission:Attendance Report');
        Route::get('/no-meeting-report', [ReportController::class, 'noMeetingReport'])->name('no-meeting-report')->middleware('permission:No Meeting Report');
        Route::get('/edit-log-report', [ReportController::class, 'editLogReport'])->name('edit-log-report')->middleware('permission:Edit Log Report');
        Route::get('/my-future-calls', [ReportController::class, 'myFutureCalls'])->name('my-future-calls');
        Route::get('/my-future-mails', [ReportController::class, 'myFutureMails'])->name('my-future-mails');
        Route::get('/followup-auto-logs-report', [ReportController::class, 'getFollowupAutoLogsReport'])->name('followup-auto-logs-report')->middleware('permission:Edit Log Report');
        Route::get('/finance-report', [ReportController::class, 'getFinanceReport'])->name('finance-report')->middleware('permission:Finance Report');
        Route::any('/daily-report', [ReportController::class, 'dailyReport'])->name('daily-report')->middleware('permission:Daily Report');
    });

    Route::resource('roles', RoleController::class)->middleware('permission:Permission');
    Route::resource('permissions', PermissionController::class)->middleware('permission:Permission');
    Route::prefix('roles-permissions')->name('roles-permissions.')->middleware('permission:Make Users')->group(function () {
        // Route::resource('users', UserController::class);
        Route::get('/employee-list', [EmployeeController::class, 'index'])->name('employee-list');
        Route::get('/make-user', [EmployeeController::class, 'create'])->name('make-user');
        Route::post('/make-user', [EmployeeController::class, 'store'])->name('store-user');
        Route::get('/edit-user/{username}', [EmployeeController::class, 'edit'])->name('edit-user');
        Route::put('/update-user/{username}', [EmployeeController::class, 'update'])->name('update-user');
        // Route::put('/toggle-user-status/{username}', [EmployeeController::class, 'toggleUserStatus'])->name('toggle-user-status');
    });

    Route::prefix('chat')->name('chat.')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::get('/recent-chat-list/{userId?}', [ChatController::class, 'recentChatList'])->name('recent-chat-list');
        Route::get('/get-chat-messages/{userid}/{otherUser?}', [ChatController::class, 'getChatMessages'])->name('get-chat-messages');
        Route::get('/set-chat-read/{userid}/{otherUser?}', [ChatController::class, 'setChatRead'])->name('set-chat-read');
        Route::post('/send-message', [ChatController::class, 'store'])->name('send-message');
    });
});
