<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         *
        echo("Profile Bio\n");
        DB::statement("insert ignore into jodi_laravel.profile_bio (rno,gender,refname,dob,tob,age,pob,religion,caste,subcaste,gotra,hght,hghtft,wtkg,complexion,dd,bg,astrostatus,drinkinghabit,smokinghabit,eatinghabit,spects,education,occupation,income,rs,ms,childstatus,dtype,payment,profiledate,empid,rfno,brand,created_at,updated_at) Select li.rno, li.gender, li.refname, li.dob, li.tob, li.age, li.pob, li.religion, li.caste, li.subcaste, li.gotra, li.hght, li.hghtft, li.wtkg, li.complexion, li.dd, li.bg, li.astrostatus, li.drinkinghabit, li.smokinghabit, li.eatinghabit, li.spects, li.education, li.occupation, li.income, li.rs, li.ms, li.childstatus, li.dtype, li.payment, li.profiledate, li.empid, li.rfno, li.brand, NOW(), NOW() from old_jodi.profile_bio as li");

        DB::statement("insert ignore into jodi_laravel.profile_bs (rno, bsname, bs, bsage, bsmarriage, bsdetails, created_at, updated_at) SELECT li.rno, li.bsname, li.bs, li.bsage, li.bsmarriage, li.bsdetails, NOW(), NOW() FROM old_jodi.profile_bs as li");

        DB::statement("insert ignore into jodi_laravel.profile_education (rno, educourse, eduinst, eduyear, created_at, updated_at) SELECT li.rno, li.educourse, li.eduinst, li.eduyear, NOW(), NOW() FROM old_jodi.profile_education as li");

        DB::statement("insert ignore into jodi_laravel.profile_organisation (rno, orgname, orgdept, orgyear, created_at, updated_at) SELECT li.rno, li.orgname, li.orgdept, li.orgyear, NOW(), NOW() FROM old_jodi.profile_organisation as li");

        DB::statement("insert ignore into jodi_laravel.profile_personal (rno, visa, rcity, rcountry, marriageinfo, child, childdetails, occdetails, familyvalue, familystatus, fathersname, mothersname, fatherdetails, motherdetails, fatherocc, motherocc, familyincome, familyincomem, typeoffamily, familynative, hobbies, characteristics, eyecolor, haircolor, salary, budget, nationality, familyhistory, contactperson, contactaddress, contactcity, contactstate, contactpincode, contactcountry, contactphone, contactemail, contactrelation, personaldetails, contactzone, arealocation, created_at, updated_at) SELECT li.rno, li.visa, li.rcity, li.rcountry, li.marriageinfo, li.child, li.childdetails, li.occdetails, li.familyvalue, li.familystatus, li.fathersname, li.mothersname, li.fatherdetails, li.motherdetails, li.fatherocc, li.motherocc, li.familyincome, li.familyincomem, li.typeoffamily, li.familynative, li.hobbies, li.characteristics, li.eyecolor, li.haircolor, li.salary, li.budget, li.nationality, li.familyhistory, li.contactperson, li.contactaddress, li.contactcity, li.contactstate, li.contactpincode, li.contactcountry, li.contactphone, li.contactemail, li.contactrelation, li.personaldetails, li.contactzone, li.arealocation, NOW(), NOW() FROM old_jodi.profile_personal as li");

        DB::statement("insert ignore into jodi_laravel.viewprofile (rno, g, refname, y, m, rl, cst, hg, hghtft, wt, eh, ast, ed, oc, pi, rs, ms, ch, fi, tc, mc, rm, p_sent, last_mail, last_call, last_mtng, dtype, status, ost, vc, op, st, created_at, updated_at) SELECT li.rno, li.g, li.refname, li.y, li.m, li.rl, li.cst, li.hg, li.hghtft, li.wt, li.eh, li.ast, li.ed, li.oc, li.pi, li.rs, li.ms, li.ch, li.fi, li.tc, li.mc, li.rm, li.p_sent, li.last_mail, li.last_call, li.last_mtng, li.dtype, li.status, li.ost, li.vc, li.op, li.st, NOW(), NOW() FROM old_jodi.viewprofile as li");

        DB::statement("insert ignore into jodi_laravel.profile_payment (rno, amount, dated, details, created_at, updated_at) SELECT li.rno, li.amount, li.dated, li.details, NOW(), NOW() FROM old_jodi.profile_payment as li");

        DB::statement("insert ignore into jodi_laravel.convert_log (old_rno, new_rno, empid, dated, created_at, updated_at) SELECT li.old_rno,  li.new_rno,  li.empid, li.dated, NOW(), NOW() FROM old_jodi.convert_log as li");

        DB::statement("insert ignore into jodi_laravel.snaps (rno, photo, sorting, created_at, updated_at) SELECT li.rno, li.photo, li.sorting, NOW(), NOW() FROM old_jodi.snap as li");
        
        
        DB::statement("insert ignore into jodi_laravel.profile_matches (rno, agefrom, ageupto, hghtfrom, hghtto, religion, caste, education, edupref, eatingpref, astropref, rspref, mspref, childpref, occupref, incomepref, zonepref, mr, created_at, updated_at) SELECT li.rno, li.agefrom, li.ageupto, li.hghtfrom, li.hghtto, li.religion, li.caste, li.education, li.edupref, li.eatingpref, li.astropref, li.rspref, li.mspref, li.childpref, li.occupref, li.incomepref, li.zonepref, li.mr, NOW(), NOW() FROM old_jodi.profile_match as li");

        DB::statement("insert ignore into jodi_laravel.profile_moreinfo (rno, dated, time, empid, metwith, member, profession, family, prop1, prop2, prop3, properties, residence, business, income, rentedincome, turnover, vehicle, roka, remarks, created_at, updated_at) SELECT li.rno, li.dated, li.time, li.empid, li.metwith, li.member, li.profession, li.family, li.prop1, li.prop2, li.prop3, li.properties, li.residence, li.business, li.income, li.rentedincome, li.turnover, li.vehicle, li.roka, li.remarks, NOW(), NOW() FROM old_jodi.profile_moreinfo as li");

        
        DB::statement("insert ignore into jodi_laravel.interaction (rno, dated, time, empid, calltype, callstatus, description, futuredate, status, created_at, updated_at) SELECT li.rno, li.dated, li.time, li.empid, li.calltype, li.callstatus, li.description, li.futuredate, li.status, NOW(), NOW() FROM old_jodi.interaction as li");

        DB::statement("insert ignore into jodi_laravel.followup (rno, empid, dated, d_by, futuredate, created_at, updated_at) SELECT li.rno, li.empid, li.dated, li.d_by, li.futuredate, NOW(), NOW() FROM old_jodi.followup as li");

        DB::statement("insert ignore into jodi_laravel.meeting (rno, proposal, dated, time, place, mtg_by1, mtg_by2, meeting_type, remarks, att_by1, att_by2, created_at, updated_at) SELECT li.rno, li.proposal, li.dated, li.time, li.place, li.mtg_by1, li.mtg_by2, li.meeting_type, li.remarks, li.att_by1, li.att_by2, NOW(), NOW() FROM old_jodi.meeting as li");
        
        DB::statement("insert ignore into jodi_laravel.messages (dated, time, msgfrom, msgto, message, received, created_at, updated_at) SELECT li.dated, li.time, li.msgfrom, li.msgto, li.message, li.received, NOW(), NOW() FROM old_jodi.messages as li");

        DB::statement("insert ignore into jodi_laravel.appointments (empid,rno, refname, contactaddress, contactphone, apttype, aptdate, apttime, remarks, aptstatus, update_date, aptremarks, att_by1, att_by2, created_at, updated_at) SELECT li.empid,li.rno, li.refname, li.contactaddress, li.contactphone, li.apttype, li.aptdate, li.apttime, li.remarks, li.aptstatus, li.update_date, li.aptremarks, li.att_by1, li.att_by2, NOW(), NOW() FROM old_jodi.appointment as li");
        
        DB::statement("insert ignore into jodi_laravel.client_sl (rno, proposal, dated, time, status, remarks, slby, doneby, donedate, created_at, updated_at) SELECT li.rno, li.proposal, li.dated, li.time, li.status, li.remarks, li.slby, li.doneby, li.donedate, NOW(), NOW() FROM old_jodi.clientsl as li");

        DB::statement("insert ignore into jodi_laravel.refer (refno, referencename, candidatename, searchingfor, address, city, contactno, emailid, source, givenby, remarks, status, assignto, dated, empid, created_at, updated_at) SELECT li.rno, li.referencename, li.candidatename, li.searchingfor, li.address, li.city, li.contactno, li.emailid, li.source, li.givenby, li.remarks, li.status, li.assignto, li.dated, li.empid, NOW(), NOW() FROM old_jodi.refer as li");
        
        
        echo nl2br("start Sendmail import\n");
        DB::statement("insert ignore into jodi_laravel.sendmail (dated, time, rno, proposal, photos, matter, wc, pdftype, empid, status, addl_st, feedback, feedback1, fdb_by, fdb_date, created_at, updated_at) SELECT li.dated, li.time, li.rno, li.proposal, li.photos, li.matter, li.wc, li.pdftype, li.empid, li.status, li.addl_st, li.feedback, li.feedback1, li.fdb_by, li.fdb_date, NOW(), NOW() FROM old_jodi.sendmail as li");
        echo nl2br("finish Sendmail import\n");
        
        echo nl2br("start Classified import\n");
        DB::statement("insert ignore into jodi_laravel.classified (rno, empid, dated, time, status, created_at, updated_at) SELECT li.rno, li.empid, li.dated, li.time, li.status, NOW(), NOW() FROM old_jodi.classified as li");
        echo nl2br("finish Classified import\n");
        
        echo nl2br("start Bouncedmail import\n");
        DB::statement("insert ignore into jodi_laravel.bouncedmail (rno, email, created_at, updated_at) SELECT li.rno, li.email, NOW(), NOW() FROM old_jodi.bouncedemail as li");
        echo nl2br("finish Bouncedmail import\n");
        
        echo nl2br("start fix_member import\n");
        DB::statement("insert ignore into jodi_laravel.fix_member (rno, dated, time, fix_by, fixed_through, remarks, status, update_by, update_date, update_time) SELECT li.rno, li.dated, li.time, li.fix_by, li.fixed_through, li.remarks, li.status, li.update_by, li.update_date, li.update_time FROM old_jodi.fix_member as li");
        echo nl2br("finish fix_member import\n");
        
        echo nl2br("start enquiry import\n");
        DB::statement("insert ignore into jodi_laravel.enquiry (rno, dated, time, empid, enqpur, remarks, furtheraction, slfor, updatedby, updatedatetime, status, created_at, updated_at) SELECT li.rno, li.dated, li.time, li.empid, li.enqpur, li.remarks, li.furtheraction, li.slfor, li.updatedby, li.updatedatetime, li.status, NOW(), NOW() FROM old_jodi.enquiry as li");
        echo nl2br("finish enquiry import\n");
         
        echo nl2br("start feedback import\n");
        DB::statement("insert ignore into jodi_laravel.feedback (rno, proposal, fstatus, feedback, fdate, time, fby, created_at, updated_at) SELECT li.rno, li.proposal, li.fstatus, li.feedback, li.fdate, li.time, li.fby, NOW(), NOW() FROM old_jodi.feedback as li");
        echo nl2br("finish feedback import\n");


        echo nl2br("start hold_member import\n");
        DB::statement("insert ignore into jodi_laravel.hold_member (rno, hold_req_by, hold_by, dated, time, reason, status) SELECT li.rno, li.hold_req_by, li.hold_by, li.dated, li.time, li.reason, li.status FROM old_jodi.hold_member as li");
        echo nl2br("finish hold_member import\n");


        echo nl2br("start feedback_option import\n");
        DB::statement("insert ignore into jodi_laravel.feedback_option (feedback, status, created_at, updated_at) SELECT li.feedback, 1, NOW(), NOW() FROM old_jodi.feedback_option as li");
        echo nl2br("finish feedback_option import\n");
        
        echo nl2br("start profile_details import\n");
        DB::statement("insert ignore into jodi_laravel.profile_details (rno, package, service, tc, mc, rm, otherdetails, reference, duration, created_at, updated_at) SELECT li.rno, li.package, li.service, li.tc, li.mc, li.rm, li.otherdetails, li.reference, li.duration, NOW(), NOW() FROM old_jodi.profile_details as li");
        echo nl2br("finish profile_details import\n");
        

        echo nl2br("start form_transfer import\n");
        DB::statement("insert ignore into jodi_laravel.form_transfer (rno, assign_from, assign_date, assign_time, assign_to, received_date, received_time, remarks, created_at, updated_at) SELECT li.rno, li.assign_from, li.assign_date, li.assign_time, li.assign_to, li.received_date, li.received_time, li.remarks, NOW(), NOW() FROM old_jodi.form_transfer as li");
        echo nl2br("finish form_transfer import\n");


        echo nl2br("start from advtdata import\n");
        DB::statement("insert ignore into jodi_laravel.advtdata (rno, matchfor, age, hght, community, education, occupation, mobile, email, remarks, assignto, empid, edate) SELECT li.rno, li.matchfor, li.age, li.hght, li.community, li.education, li.occupation, li.mobile, li.email, li.remarks, li.assignto, li.empid, li.edate FROM old_jodi.advtdata as li");
        echo nl2br("finish advtdata import\n");
         */
    }
}
