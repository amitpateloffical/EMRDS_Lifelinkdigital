@extends('components.main')
@section('container')
    <div id="rcms-dashboard">
        <div class="container-fluid">
            <div class="dash-grid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="inner-block left-block" style="height: calc(100vh - 170px); background:white;">
                            <div class="scope-block mb-3">
                                <div class="block view-block">
                                    <div class="head" onclick="toggleview()">
                                        <i class="fa-solid fa-caret-right"></i>
                                        &nbsp;&nbsp;<strong>My Dashbaord</strong>
                                    </div>
                                    <div class="stat-list view-list">
                                        <div class="sub-head">
                                            Public
                                        </div>
                                        <div class="items">
                                            {{-- <div>All Open Change Controls</div> --}}
                                            {{-- <div>All of My Originated Records</div> --}}
                                            <div>Assigned to Me (All)</div>
                                            <div>Assigned to Me (Open)</div>
                                            <div>Audit Management (All)</div>
                                            {{-- <div>Change Control Assigned to Me</div> --}}
                                            <div>My Suupliers</div>
                                            <div>Originated by Me</div>
                                            <div>Pending Approval Stratas</div>
                                            <div>Quality Events Assigned to Me</div>
                                            <div>Scheduled For Me</div>
                                            <div>Stratas Records Assigned to Me</div>
                                            <div>Stratas Records Originated to Me</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="scope-block mb-0">
                                <div class="block">
                                    <div class="head">
                                        <strong>Scope and Queries</strong>
                                    </div>
                                    <div class="list">
                                        <div class="group-input">
                                            <label for="eMRDS">eMRDS</label>
                                            <select name="eMRDS">
                                                <option value="0">-- Select --</option>
                                                <optgroup label="Public">

                                                    <option id="single-selection_2" value="2" selected>Pre-Employment
                                                        Medical Check-Up</option>
                                                    <option id="single-selection_-9999" value="-9999">Periodic Medical
                                                        Check-Up</option>
                                                    <option id="single-selection_30" value="30">Annual Health Check-Up
                                                    </option>
                                                    <option id="single-selection_65" value="65">Vaccination Of Employees
                                                    </option>
                                                    <option id="single-selection_211" value="211">Eye Test Of Employees
                                                    </option>
                                                    <option id="single-selection_55" value="55">Chest X-ray Test Of
                                                        Employees</option>
                                                    <option id="single-selection_13" value="13">
                                                        Exit Medical Check-Up Employees</option>
                                                    <option id="single-selection_209" value="209">Biomedical Waste Record
                                                    </option>
                                                    <option id="single-selection_126" value="126">First Aid & First Aid
                                                        Boxes
                                                    </option>
                                                    <option id="single-selection_85" value="85">Vaccination Consumption
                                                        Record</option>
                                                    <option id="single-selection_31" value="31">Medical Check-Up Of
                                                        Visitors / Auditors</option>
                                                    <option id="single-selection_213" value="213">SIIPL Canteen
                                                        Employees Medical Check-Up</option>
                                                    <option id="single-selection_43" value="43">Trainee Medical Check-Up
                                                    </option>
                                                    <option id="single-selection_33" value="33">Hep-B Periodic Health
                                                        Check-Up</option>
                                                    <option id="single-selection_161" value="161">Form No - 7
                                                    </option>
                                                    <option id="single-selection_16" value="16">Annual Maintenance
                                                        Record</option>
                                                    <option id="single-selection_203" value="203">Provision For Addition
                                                        Of Any New Workflow
                                                    </option>
                                                    {{-- <option id="single-selection_54" value="54">Environmental</option>
                                                    <option id="single-selection_134" value="134">Environmental Tasks
                                                    </option>
                                                    <option id="single-selection_45" value="45">Equipment Handling
                                                    </option>
                                                    <option id="single-selection_83" value="83">Executive</option>
                                                    <option id="single-selection_17" value="17">Food &amp; Beverage
                                                    </option>
                                                    <option id="single-selection_86" value="86">Global</option>
                                                    <option id="single-selection_194" value="194">Intake</option>
                                                    <option id="single-selection_99" value="99">MedDev Complaints
                                                    </option>
                                                    <option id="single-selection_78" value="78">Medical Device</option>
                                                    <option id="single-selection_114" value="114">Mobile</option>
                                                    <option id="single-selection_81" value="81">Observations</option>
                                                    <option id="single-selection_80" value="80">QMS</option>
                                                    <option id="single-selection_5" value="5">Quality Event</option>
                                                    <option id="single-selection_176" value="176">RA: Device
                                                        Registrations Only</option>
                                                    <option id="single-selection_4" value="4">RA: Registrations &amp;
                                                        Submissions Only</option>
                                                    <option id="single-selection_26" value="26">RA: Registrations
                                                        Management</option>
                                                    <option id="single-selection_79" value="79">RA: Standalone Objects
                                                    </option>
                                                    <option id="single-selection_108" value="108">Risk Registry</option>
                                                    <option id="single-selection_137" value="137">Risks (All)</option>
                                                    <option id="single-selection_57" value="57">Select-Start</option>
                                                    <option id="single-selection_46" value="46">SQM</option>
                                                    <option id="single-selection_170" value="170">Stratas</option>
                                                    <option id="single-selection_84" value="84">Stratas (All)</option>
                                                    <option id="single-selection_148" value="148">Stratas Audits Only
                                                    </option>
                                                    <option id="single-selection_140" value="140">Stratas Change
                                                        Notifications</option>
                                                    <option id="single-selection_113" value="113">Stratas Expanded
                                                    </option>
                                                    <option id="single-selection_100" value="100">Stratas-Supplier
                                                        Record Only</option>
                                                    <option id="single-selection_146" value="146">Temprature Out of
                                                        Range</option>
                                                    <option id="single-selection_70" value="70">Training: Class Room
                                                        Training</option>
                                                    <option id="single-selection_71" value="71">Training: Employees
                                                    </option>
                                                    <option id="single-selection_19" value="19">Training: Training
                                                        Management</option>
                                                    <option id="single-selection_77" value="77">Training: Trainings
                                                        Only</option>
                                                    <option id="single-selection_196" value="196">TWD Complaints
                                                    </option>
                                                    <option id="single-selection_193" value="193">TWD Intake</option>
                                                    <option id="single-selection_197" value="197">TWD SQM</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="group-input">
                                            <label for="query">Queries</label>
                                            <select name="query">
                                                <option value="0">-- Select --</option>
                                                <optgroup label="">
                                                    <option id="single-selection_603" value="603">
                                                        Last Unsaved Query
                                                    </option>
                                                </optgroup>
                                                <optgroup label=" My Queries">
                                                    <option id="single-selection_593" value="593">
                                                        Given Record
                                                    </option>
                                                    <option id="single-selection_592" value="592" selected>
                                                        Given Record and All Related Items
                                                    </option>
                                                </optgroup>
                                                <optgroup label=" Admin Queries">
                                                    <option id="single-selection_409" value="409">All Opened CAPAs
                                                    </option>
                                                    <option id="single-selection_332" value="332">All Opened Records
                                                    </option>
                                                    <option id="single-selection_410" value="410">AQ
                                                        State=Closed-Approved</option>
                                                    <option id="single-selection_412" value="412">AQ:Record
                                                        State=Pending Change Plan</option>
                                                    <option id="single-selection_222" value="222">AQ03</option>
                                                    <option id="single-selection_374" value="374">AQ-SAI Certs
                                                        State=Pending Approval</option>
                                                    <option id="single-selection_333" value="333">Closed for 2 weeks
                                                    </option>
                                                    <option id="single-selection_334" value="334">Closed for 30 Days
                                                    </option>
                                                    <option id="single-selection_563" value="563">Date Due Not Set
                                                    </option>
                                                    <option id="single-selection_506" value="506">DDE Parent Records
                                                    </option>
                                                    <option id="single-selection_507" value="507">DDE Records</option>
                                                    <option id="single-selection_331" value="331">Rec State= Approved
                                                        Equipment</option>
                                                    <option id="single-selection_407" value="407">Record Sate = Action
                                                        Item in Progress</option>
                                                    <option id="single-selection_368" value="368">Supplier ASQ Cert due
                                                        ~ 30 days</option>
                                                    <option id="single-selection_369" value="369">Supplier ASQ Cert due
                                                        ~ 60 days</option>
                                                    <option id="single-selection_370" value="370">Supplier ASQ Cert due
                                                        ~ 90 days</option>
                                                    <option id="single-selection_360" value="360">Supplier ISO 13485
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_359" value="359">Supplier ISO 13485
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_358" value="358">Supplier ISO 13485
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_361" value="361">Supplier ISO 14001
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_363" value="363">Supplier ISO 14001
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_364" value="364">Supplier ISO 14001
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_365" value="365">Supplier ISO 14971
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_366" value="366">Supplier ISO 14971
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_367" value="367">Supplier ISO 14971
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_355" value="355">Supplier ISO 9001
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_356" value="356">Supplier ISO 9001
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_357" value="357">Supplier ISO 9001
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_371" value="371">Supplier Safe Harbor
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_372" value="372">Supplier Safe Harbor
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_373" value="373">Supplier Safe Harbor
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_208" value="208">TW State = Document
                                                        Writing</option>
                                                    <option id="single-selection_164" value="164">TW: # of Complaint/
                                                        Deviations = 4</option>
                                                    <option id="single-selection_83" value="83">TW: Active</option>
                                                    <option id="single-selection_84" value="84">TW: Active</option>
                                                    <option id="single-selection_86" value="86">TW: Active - Effective
                                                        Date</option>
                                                    <option id="single-selection_45" value="45">TW: Activity = Issue
                                                        Report</option>
                                                    <option id="single-selection_42" value="42">TW: Activity = Reject
                                                        Actions</option>
                                                    <option id="single-selection_16" value="16">TW: Actual Approval
                                                        Date is set</option>
                                                    <option id="single-selection_214" value="214">TW: Adverse
                                                        Event\Product Problem</option>
                                                    <option id="single-selection_85" value="85">TW: Approved</option>
                                                    <option id="single-selection_176" value="176">TW: Approved Records
                                                    </option>
                                                    <option id="single-selection_197" value="197">TW: AQ1001: Reg
                                                        State=Closed - Retired</option>
                                                    <option id="single-selection_70" value="70">TW: Aulin
                                                        Registrations</option>
                                                    <option id="single-selection_79" value="79">TW: Bi Monthly Due
                                                    </option>
                                                    <option id="single-selection_5" value="5">TW: Closed commitments
                                                    </option>
                                                    <option id="single-selection_8" value="8">TW: Closed Records
                                                    </option>
                                                    <option id="single-selection_127" value="127">TW: CMSs=Austria
                                                    </option>
                                                    <option id="single-selection_128" value="128">TW: CMSs=Belgium
                                                    </option>
                                                    <option id="single-selection_129" value="129">TW: CMSs=Bosnia
                                                    </option>
                                                    <option id="single-selection_130" value="130">TW: CMSs=Bulgaria
                                                    </option>
                                                    <option id="single-selection_131" value="131">TW: CMSs=Cyprus
                                                    </option>
                                                    <option id="single-selection_132" value="132">TW: CMSs=Czech
                                                    </option>
                                                    <option id="single-selection_133" value="133">TW: CMSs=Denmark
                                                    </option>
                                                    <option id="single-selection_134" value="134">TW: CMSs=Estonia
                                                    </option>
                                                    <option id="single-selection_135" value="135">TW: CMSs=Finland
                                                    </option>
                                                    <option id="single-selection_136" value="136">TW: CMSs=France
                                                    </option>
                                                    <option id="single-selection_106" value="106">TW: CMSs=Germany
                                                    </option>
                                                    <option id="single-selection_137" value="137">TW: CMSs=Greece
                                                    </option>
                                                    <option id="single-selection_138" value="138">TW: CMSs=Hungary
                                                    </option>
                                                    <option id="single-selection_139" value="139">TW: CMSs=Iceland
                                                    </option>
                                                    <option id="single-selection_140" value="140">TW: CMSs=Ireland
                                                    </option>
                                                    <option id="single-selection_141" value="141">TW: CMSs=Italy
                                                    </option>
                                                    <option id="single-selection_142" value="142">TW: CMSs=Latvia
                                                    </option>
                                                    <option id="single-selection_143" value="143">TW: CMSs=Lithuania
                                                    </option>
                                                    <option id="single-selection_144" value="144">TW: CMSs=Luxembourg
                                                    </option>
                                                    <option id="single-selection_145" value="145">TW: CMSs=Macedonia
                                                    </option>
                                                    <option id="single-selection_107" value="107">TW: CMSs=Netherlands
                                                    </option>
                                                    <option id="single-selection_146" value="146">TW: CMSs=Norway
                                                    </option>
                                                    <option id="single-selection_147" value="147">TW: CMSs=Poland
                                                    </option>
                                                    <option id="single-selection_148" value="148">TW: CMSs=Portugal
                                                    </option>
                                                    <option id="single-selection_149" value="149">TW: CMSs=Romania
                                                    </option>
                                                    <option id="single-selection_150" value="150">TW: CMSs=Serbia
                                                    </option>
                                                    <option id="single-selection_151" value="151">TW: CMSs=Slovakia
                                                    </option>
                                                    <option id="single-selection_152" value="152">TW: CMSs=Slovenia
                                                    </option>
                                                    <option id="single-selection_153" value="153">TW: CMSs=Spain
                                                    </option>
                                                    <option id="single-selection_154" value="154">TW: CMSs=Sweden
                                                    </option>
                                                    <option id="single-selection_155" value="155">TW: CMSs=Switzerland
                                                    </option>
                                                    <option id="single-selection_108" value="108">TW: CMSs=United
                                                        Kingdom</option>
                                                    <option id="single-selection_25" value="25">TW: Correspondence
                                                        Type = Question</option>
                                                    <option id="single-selection_160" value="160">TW: Day 210,Act App.
                                                        Date, Reg # Updated</option>
                                                    <option id="single-selection_159" value="159">TW: Day 210,Act App.
                                                        Date,Reg # Updated</option>
                                                    <option id="single-selection_60" value="60">TW: Delayed</option>
                                                    <option id="single-selection_192" value="192">TW: Demerit Points =
                                                        100</option>
                                                    <option id="single-selection_191" value="191">TW: Demerit Points =
                                                        50</option>
                                                    <option id="single-selection_30" value="30">TW: Docs Effective
                                                        Today</option>
                                                    <option id="single-selection_119" value="119">TW: Document in State
                                                        = Effective</option>
                                                    <option id="single-selection_187" value="187">TW: Due Date CAPA
                                                        response</option>
                                                    <option id="single-selection_103" value="103">TW: Effectiveness
                                                        Check Required</option>
                                                    <option id="single-selection_183" value="183">TW: Effectiveness
                                                        check required - syste</option>
                                                    <option id="single-selection_180" value="180">TW: Empty Trade Name
                                                    </option>
                                                    <option id="single-selection_109" value="109">TW: Germany=Germany
                                                    </option>
                                                    <option id="single-selection_94" value="94">TW: Hazard: Non
                                                        Significant State:Opened</option>
                                                    <option id="single-selection_78" value="78">TW: Monthly Due
                                                    </option>
                                                    <option id="single-selection_169" value="169">TW: Near Miss Only
                                                    </option>
                                                    <option id="single-selection_110" value="110">TW:
                                                        Netherlands=Netherlands</option>
                                                    <option id="single-selection_53" value="53">TW: Next Renewal Date
                                                        Changed</option>
                                                    <option id="single-selection_24" value="24">TW: Next Renewal Date
                                                        is set</option>
                                                    <option id="single-selection_9" value="9">TW: Open Records
                                                    </option>
                                                    <option id="single-selection_51" value="51">TW: Open Records
                                                    </option>
                                                    <option id="single-selection_58" value="58">TW: Open Records
                                                    </option>
                                                    <option id="single-selection_10" value="10">TW: Open Records NIU
                                                    </option>
                                                    <option id="single-selection_61" value="61">TW: Pending Approval
                                                    </option>
                                                    <option id="single-selection_185" value="185">TW: Pending States in
                                                        Observations</option>
                                                    <option id="single-selection_46" value="46">TW: Priority = High
                                                    </option>
                                                    <option id="single-selection_49" value="49">TW: Priority = Low
                                                    </option>
                                                    <option id="single-selection_48" value="48">TW: Priority = Medium
                                                    </option>
                                                    <option id="single-selection_156" value="156">TW: Procedure Type =
                                                        CP</option>
                                                    <option id="single-selection_47" value="47">TW: Proirity = High
                                                    </option>
                                                    <option id="single-selection_212" value="212">TW: State =
                                                        Investigation</option>
                                                    <option id="single-selection_36" value="36">TW: State = Actions
                                                        Items in Progress</option>
                                                    <option id="single-selection_166" value="166">TW: State = Active
                                                    </option>
                                                    <option id="single-selection_29" value="29">TW: State = CAPA
                                                        Execution in Progress</option>
                                                    <option id="single-selection_21" value="21">TW: State = Closed -
                                                        Cancelled</option>
                                                    <option id="single-selection_19" value="19">TW: State = Closed -
                                                        Not Apporved</option>
                                                    <option id="single-selection_20" value="20">TW: State = Closed -
                                                        Withdrawn</option>
                                                    <option id="single-selection_18" value="18">TW: State = Closed
                                                        Approved</option>
                                                    <option id="single-selection_181" value="181">TW: State = Deviation
                                                        in Progress</option>
                                                    <option id="single-selection_43" value="43">TW: State = Document
                                                        Approval</option>
                                                    <option id="single-selection_33" value="33">TW: State = Effective
                                                    </option>
                                                    <option id="single-selection_31" value="31">TW: State = Effective
                                                        &amp; Eff.Date&lt;Today</option>
                                                    <option id="single-selection_207" value="207">TW: State = Effective
                                                        and Closed</option>
                                                    <option id="single-selection_39" value="39">TW: State = Opened
                                                    </option>
                                                    <option id="single-selection_4" value="4">TW: State =
                                                        Pend.Commitment + Comm Requi</option>
                                                    <option id="single-selection_14" value="14">TW: State =
                                                        Pend.Commitment + No Comm</option>
                                                    <option id="single-selection_34" value="34">TW: State = Pending
                                                        Action Completion</option>
                                                    <option id="single-selection_219" value="219">TW: State = Pending
                                                        Approval as Obsolete</option>
                                                    <option id="single-selection_7" value="7">TW: State = Pending
                                                        Change</option>
                                                    <option id="single-selection_28" value="28">TW: State = Pending
                                                        Change NIU</option>
                                                    <option id="single-selection_13" value="13">TW: State = Pending
                                                        com.more then 2 days</option>
                                                    <option id="single-selection_118" value="118">TW: State = Pending
                                                        final Approval+Close</option>
                                                    <option id="single-selection_217" value="217">TW: State = Pending
                                                        Implementation</option>
                                                    <option id="single-selection_182" value="182">TW: State = Pending
                                                        Observation Completi</option>
                                                    <option id="single-selection_37" value="37">TW: State = Pending
                                                        Preventing Action</option>
                                                    <option id="single-selection_116" value="116">TW: State = Pending
                                                        Production Line Audi</option>
                                                    <option id="single-selection_40" value="40">TW: State = Pending QA
                                                        Plan Approval</option>
                                                    <option id="single-selection_32" value="32">TW: State = Pending
                                                        Response</option>
                                                    <option id="single-selection_170" value="170">TW: State =
                                                        Supervisor Review</option>
                                                    <option id="single-selection_171" value="171">TW: State = Supplier
                                                        Approved</option>
                                                    <option id="single-selection_35" value="35">TW: State = Work in
                                                        Progress</option>
                                                    <option id="single-selection_216" value="216">TW: State= CAPA
                                                        Complete</option>
                                                    <option id="single-selection_117" value="117">TW: States =
                                                        Observation states</option>
                                                    <option id="single-selection_188" value="188">TW: TA602:ClassRoom
                                                        Tr.@Class Completed</option>
                                                    <option id="single-selection_111" value="111">TW: United
                                                        Kingdom=United Kingdom</option>
                                                    <option id="single-selection_62" value="62">TW: Upcoming</option>
                                                    <option id="single-selection_161" value="161">TW: Verification
                                                        Status = Verified</option>
                                                    <option id="single-selection_77" value="77">TW: Weekly Due
                                                    </option>
                                                    <option id="single-selection_121" value="121">TW:Complaint/
                                                        Deviation counter = 4</option>
                                                    <option id="single-selection_157" value="157">TWS: procedure
                                                        type=CP </option>
                                                    <option id="single-selection_544" value="544">TWS-Cancel=Cancel,
                                                        Opened Only</option>
                                                </optgroup>
                                                <optgroup label=" Admin Queries">
                                                    <option id="single-selection_409" value="409">All Opened CAPAs
                                                    </option>
                                                    <option id="single-selection_332" value="332">All Opened Records
                                                    </option>
                                                    <option id="single-selection_410" value="410">AQ
                                                        State=Closed-Approved</option>
                                                    <option id="single-selection_412" value="412">AQ:Record
                                                        State=Pending Change Plan</option>
                                                    <option id="single-selection_222" value="222">AQ03</option>
                                                    <option id="single-selection_374" value="374">AQ-SAI Certs
                                                        State=Pending Approval</option>
                                                    <option id="single-selection_333" value="333">Closed for 2 weeks
                                                    </option>
                                                    <option id="single-selection_334" value="334">Closed for 30 Days
                                                    </option>
                                                    <option id="single-selection_563" value="563">Date Due Not Set
                                                    </option>
                                                    <option id="single-selection_506" value="506">DDE Parent Records
                                                    </option>
                                                    <option id="single-selection_507" value="507">DDE Records</option>
                                                    <option id="single-selection_331" value="331">Rec State= Approved
                                                        Equipment</option>
                                                    <option id="single-selection_407" value="407">Record Sate = Action
                                                        Item in Progress</option>
                                                    <option id="single-selection_368" value="368">Supplier ASQ Cert due
                                                        ~ 30 days</option>
                                                    <option id="single-selection_369" value="369">Supplier ASQ Cert due
                                                        ~ 60 days</option>
                                                    <option id="single-selection_370" value="370">Supplier ASQ Cert due
                                                        ~ 90 days</option>
                                                    <option id="single-selection_360" value="360">Supplier ISO 13485
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_359" value="359">Supplier ISO 13485
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_358" value="358">Supplier ISO 13485
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_361" value="361">Supplier ISO 14001
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_363" value="363">Supplier ISO 14001
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_364" value="364">Supplier ISO 14001
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_365" value="365">Supplier ISO 14971
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_366" value="366">Supplier ISO 14971
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_367" value="367">Supplier ISO 14971
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_355" value="355">Supplier ISO 9001
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_356" value="356">Supplier ISO 9001
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_357" value="357">Supplier ISO 9001
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_371" value="371">Supplier Safe Harbor
                                                        Cert due ~ 30 days</option>
                                                    <option id="single-selection_372" value="372">Supplier Safe Harbor
                                                        Cert due ~ 60 days</option>
                                                    <option id="single-selection_373" value="373">Supplier Safe Harbor
                                                        Cert due ~ 90 days</option>
                                                    <option id="single-selection_208" value="208">TW State = Document
                                                        Writing</option>
                                                    <option id="single-selection_164" value="164">TW: # of Complaint/
                                                        Deviations = 4</option>
                                                    <option id="single-selection_83" value="83">TW: Active</option>
                                                    <option id="single-selection_84" value="84">TW: Active</option>
                                                    <option id="single-selection_86" value="86">TW: Active - Effective
                                                        Date</option>
                                                    <option id="single-selection_45" value="45">TW: Activity = Issue
                                                        Report</option>
                                                    <option id="single-selection_42" value="42">TW: Activity = Reject
                                                        Actions</option>
                                                    <option id="single-selection_16" value="16">TW: Actual Approval
                                                        Date is set</option>
                                                    <option id="single-selection_214" value="214">TW: Adverse
                                                        Event\Product Problem</option>
                                                    <option id="single-selection_85" value="85">TW: Approved</option>
                                                    <option id="single-selection_176" value="176">TW: Approved Records
                                                    </option>
                                                    <option id="single-selection_197" value="197">TW: AQ1001: Reg
                                                        State=Closed - Retired</option>
                                                    <option id="single-selection_70" value="70">TW: Aulin
                                                        Registrations</option>
                                                    <option id="single-selection_79" value="79">TW: Bi Monthly Due
                                                    </option>
                                                    <option id="single-selection_5" value="5">TW: Closed commitments
                                                    </option>
                                                    <option id="single-selection_8" value="8">TW: Closed Records
                                                    </option>
                                                    <option id="single-selection_127" value="127">TW: CMSs=Austria
                                                    </option>
                                                    <option id="single-selection_128" value="128">TW: CMSs=Belgium
                                                    </option>
                                                    <option id="single-selection_129" value="129">TW: CMSs=Bosnia
                                                    </option>
                                                    <option id="single-selection_130" value="130">TW: CMSs=Bulgaria
                                                    </option>
                                                    <option id="single-selection_131" value="131">TW: CMSs=Cyprus
                                                    </option>
                                                    <option id="single-selection_132" value="132">TW: CMSs=Czech
                                                    </option>
                                                    <option id="single-selection_133" value="133">TW: CMSs=Denmark
                                                    </option>
                                                    <option id="single-selection_134" value="134">TW: CMSs=Estonia
                                                    </option>
                                                    <option id="single-selection_135" value="135">TW: CMSs=Finland
                                                    </option>
                                                    <option id="single-selection_136" value="136">TW: CMSs=France
                                                    </option>
                                                    <option id="single-selection_106" value="106">TW: CMSs=Germany
                                                    </option>
                                                    <option id="single-selection_137" value="137">TW: CMSs=Greece
                                                    </option>
                                                    <option id="single-selection_138" value="138">TW: CMSs=Hungary
                                                    </option>
                                                    <option id="single-selection_139" value="139">TW: CMSs=Iceland
                                                    </option>
                                                    <option id="single-selection_140" value="140">TW: CMSs=Ireland
                                                    </option>
                                                    <option id="single-selection_141" value="141">TW: CMSs=Italy
                                                    </option>
                                                    <option id="single-selection_142" value="142">TW: CMSs=Latvia
                                                    </option>
                                                    <option id="single-selection_143" value="143">TW: CMSs=Lithuania
                                                    </option>
                                                    <option id="single-selection_144" value="144">TW: CMSs=Luxembourg
                                                    </option>
                                                    <option id="single-selection_145" value="145">TW: CMSs=Macedonia
                                                    </option>
                                                    <option id="single-selection_107" value="107">TW: CMSs=Netherlands
                                                    </option>
                                                    <option id="single-selection_146" value="146">TW: CMSs=Norway
                                                    </option>
                                                    <option id="single-selection_147" value="147">TW: CMSs=Poland
                                                    </option>
                                                    <option id="single-selection_148" value="148">TW: CMSs=Portugal
                                                    </option>
                                                    <option id="single-selection_149" value="149">TW: CMSs=Romania
                                                    </option>
                                                    <option id="single-selection_150" value="150">TW: CMSs=Serbia
                                                    </option>
                                                    <option id="single-selection_151" value="151">TW: CMSs=Slovakia
                                                    </option>
                                                    <option id="single-selection_152" value="152">TW: CMSs=Slovenia
                                                    </option>
                                                    <option id="single-selection_153" value="153">TW: CMSs=Spain
                                                    </option>
                                                    <option id="single-selection_154" value="154">TW: CMSs=Sweden
                                                    </option>
                                                    <option id="single-selection_155" value="155">TW: CMSs=Switzerland
                                                    </option>
                                                    <option id="single-selection_108" value="108">TW: CMSs=United
                                                        Kingdom</option>
                                                    <option id="single-selection_25" value="25">TW: Correspondence
                                                        Type = Question</option>
                                                    <option id="single-selection_160" value="160">TW: Day 210,Act App.
                                                        Date, Reg # Updated</option>
                                                    <option id="single-selection_159" value="159">TW: Day 210,Act App.
                                                        Date,Reg # Updated</option>
                                                    <option id="single-selection_60" value="60">TW: Delayed</option>
                                                    <option id="single-selection_192" value="192">TW: Demerit Points =
                                                        100</option>
                                                    <option id="single-selection_191" value="191">TW: Demerit Points =
                                                        50</option>
                                                    <option id="single-selection_30" value="30">TW: Docs Effective
                                                        Today</option>
                                                    <option id="single-selection_119" value="119">TW: Document in State
                                                        = Effective</option>
                                                    <option id="single-selection_187" value="187">TW: Due Date CAPA
                                                        response</option>
                                                    <option id="single-selection_103" value="103">TW: Effectiveness
                                                        Check Required</option>
                                                    <option id="single-selection_183" value="183">TW: Effectiveness
                                                        check required - syste</option>
                                                    <option id="single-selection_180" value="180">TW: Empty Trade Name
                                                    </option>
                                                    <option id="single-selection_109" value="109">TW: Germany=Germany
                                                    </option>
                                                    <option id="single-selection_94" value="94">TW: Hazard: Non
                                                        Significant State:Opened</option>
                                                    <option id="single-selection_78" value="78">TW: Monthly Due
                                                    </option>
                                                    <option id="single-selection_169" value="169">TW: Near Miss Only
                                                    </option>
                                                    <option id="single-selection_110" value="110">TW:
                                                        Netherlands=Netherlands</option>
                                                    <option id="single-selection_53" value="53">TW: Next Renewal Date
                                                        Changed</option>
                                                    <option id="single-selection_24" value="24">TW: Next Renewal Date
                                                        is set</option>
                                                    <option id="single-selection_9" value="9">TW: Open Records
                                                    </option>
                                                    <option id="single-selection_51" value="51">TW: Open Records
                                                    </option>
                                                    <option id="single-selection_58" value="58">TW: Open Records
                                                    </option>
                                                    <option id="single-selection_10" value="10">TW: Open Records NIU
                                                    </option>
                                                    <option id="single-selection_61" value="61">TW: Pending Approval
                                                    </option>
                                                    <option id="single-selection_185" value="185">TW: Pending States in
                                                        Observations</option>
                                                    <option id="single-selection_46" value="46">TW: Priority = High
                                                    </option>
                                                    <option id="single-selection_49" value="49">TW: Priority = Low
                                                    </option>
                                                    <option id="single-selection_48" value="48">TW: Priority = Medium
                                                    </option>
                                                    <option id="single-selection_156" value="156">TW: Procedure Type =
                                                        CP</option>
                                                    <option id="single-selection_47" value="47">TW: Proirity = High
                                                    </option>
                                                    <option id="single-selection_212" value="212">TW: State =
                                                        Investigation</option>
                                                    <option id="single-selection_36" value="36">TW: State = Actions
                                                        Items in Progress</option>
                                                    <option id="single-selection_166" value="166">TW: State = Active
                                                    </option>
                                                    <option id="single-selection_29" value="29">TW: State = CAPA
                                                        Execution in Progress</option>
                                                    <option id="single-selection_21" value="21">TW: State = Closed -
                                                        Cancelled</option>
                                                    <option id="single-selection_19" value="19">TW: State = Closed -
                                                        Not Apporved</option>
                                                    <option id="single-selection_20" value="20">TW: State = Closed -
                                                        Withdrawn</option>
                                                    <option id="single-selection_18" value="18">TW: State = Closed
                                                        Approved</option>
                                                    <option id="single-selection_181" value="181">TW: State = Deviation
                                                        in Progress</option>
                                                    <option id="single-selection_43" value="43">TW: State = Document
                                                        Approval</option>
                                                    <option id="single-selection_33" value="33">TW: State = Effective
                                                    </option>
                                                    <option id="single-selection_31" value="31">TW: State = Effective
                                                        &amp; Eff.Date&lt;Today</option>
                                                    <option id="single-selection_207" value="207">TW: State = Effective
                                                        and Closed</option>
                                                    <option id="single-selection_39" value="39">TW: State = Opened
                                                    </option>
                                                    <option id="single-selection_4" value="4">TW: State =
                                                        Pend.Commitment + Comm Requi</option>
                                                    <option id="single-selection_14" value="14">TW: State =
                                                        Pend.Commitment + No Comm</option>
                                                    <option id="single-selection_34" value="34">TW: State = Pending
                                                        Action Completion</option>
                                                    <option id="single-selection_219" value="219">TW: State = Pending
                                                        Approval as Obsolete</option>
                                                    <option id="single-selection_7" value="7">TW: State = Pending
                                                        Change</option>
                                                    <option id="single-selection_28" value="28">TW: State = Pending
                                                        Change NIU</option>
                                                    <option id="single-selection_13" value="13">TW: State = Pending
                                                        com.more then 2 days</option>
                                                    <option id="single-selection_118" value="118">TW: State = Pending
                                                        final Approval+Close</option>
                                                    <option id="single-selection_217" value="217">TW: State = Pending
                                                        Implementation</option>
                                                    <option id="single-selection_182" value="182">TW: State = Pending
                                                        Observation Completi</option>
                                                    <option id="single-selection_37" value="37">TW: State = Pending
                                                        Preventing Action</option>
                                                    <option id="single-selection_116" value="116">TW: State = Pending
                                                        Production Line Audi</option>
                                                    <option id="single-selection_40" value="40">TW: State = Pending QA
                                                        Plan Approval</option>
                                                    <option id="single-selection_32" value="32">TW: State = Pending
                                                        Response</option>
                                                    <option id="single-selection_170" value="170">TW: State =
                                                        Supervisor Review</option>
                                                    <option id="single-selection_171" value="171">TW: State = Supplier
                                                        Approved</option>
                                                    <option id="single-selection_35" value="35">TW: State = Work in
                                                        Progress</option>
                                                    <option id="single-selection_216" value="216">TW: State= CAPA
                                                        Complete</option>
                                                    <option id="single-selection_117" value="117">TW: States =
                                                        Observation states</option>
                                                    <option id="single-selection_188" value="188">TW: TA602:ClassRoom
                                                        Tr.@Class Completed</option>
                                                    <option id="single-selection_111" value="111">TW: United
                                                        Kingdom=United Kingdom</option>
                                                    <option id="single-selection_62" value="62">TW: Upcoming</option>
                                                    <option id="single-selection_161" value="161">TW: Verification
                                                        Status = Verified</option>
                                                    <option id="single-selection_77" value="77">TW: Weekly Due
                                                    </option>
                                                    <option id="single-selection_121" value="121">TW:Complaint/
                                                        Deviation counter = 4</option>
                                                    <option id="single-selection_157" value="157">TWS: procedure
                                                        type=CP </option>
                                                    <option id="single-selection_544" value="544">TWS-Cancel=Cancel,
                                                        Opened Only</option> --}}
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="group-input">
                                            <button class="button_theme1">Run</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div>
                            <div class="inner-block scope-table" style="height: calc(100vh - 170px);">
                                <div class="scope-watermark">
                                    <div class="logo-container">
                                        {{-- <div class="logo">
                                            <img id="img-first" src="{{ asset('assets/image/dms.png') }}" alt="..."
                                                class="w-100 h-100">
                                        </div> --}}
                                        <div class="logo">
                                            <img src="{{ asset('assets/image/conexo.png') }}" alt="..."
                                                class="w-100 h-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="main-content-table">
                                    <div class="grid-block">
                                        <div class="head-block">
                                            <div class="slogan">
                                                <strong>eMRDS :</strong>
                                                eMRDS All
                                            </div>
                                            <div class="head">
                                                All records Including Closed
                                            </div>
                                        </div>
                                        <div class="action-block">
                                            <div class="item-drop" style="display: flex;">
                                                <div class="item-btn" style="margin:10px;">
                                                    <a href="#"> Action</a>
                                                </div>

                                                <div class="items-list">
                                                    <div>Create Chart</div>
                                                    <div class="sub-head">Export</div>
                                                    <div>Print Friendly (HTML)</div>
                                                    <div>Share or Create PDF</div>
                                                    <div>Spreadsheet (csv or txt)</div>
                                                </div>
                                            </div>
                                            <div class="item-btn">
                                                <i class="fa-solid fa-gears"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-scope-table">
                                        <table class="table table-bordered" id="auditTable">
                                            <thead>
                                                <tr>
                                                    <th>Record</th>
                                                    <th>Parent ID</th>
                                                    <th>Site</th>
                                                    <th>Due date</th>
                                                    <th class="td_desc">Employee name</th>
                                                    <th>DOB</th>
                                                    <th>Medical Officer</th>
                                                    <th>Purpose</th>
                                                    <th>Date Time of Initiation</th>

                                                </tr>
                                            </thead>
                                            <tbody id="searchTable">
                                                @php
                                                    $table = json_decode($datag);

                                                @endphp
                                                @foreach ($table as $datas)
                                                    <tr>
                                                        <td>
                                                            @if($datas->parent != "-")
                                                            <a href="{{ route('medicalOfficerget', $datas->id) }}">
                                                                {{ str_pad($datas->record, 4, '0', STR_PAD_LEFT) }}
                                                            </a>
                                                            @else
                                                            <a href="{{ url('/pre-employment/assisment', $datas->id) }}">
                                                                {{ str_pad($datas->record, 4, '0', STR_PAD_LEFT) }}
                                                            </a>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if($datas->parent != "-")
                                                            {{ str_pad($datas->parent, 4, '0', STR_PAD_LEFT) }}
                                                            @else
                                                            {{$datas->parent}}
                                                            @endif
                                                        </td>
                                                        <td class="viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->type }}
                                                        </td>
                                                        <td class="td_desc viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->Due_Date }}
                                                        </td>
                                                        <td class="viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->Candidate_name }}
                                                        </td>
                                                        <td class="viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->DOB }}
                                                        </td>
                                                        <td class="viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->medical_officer }}
                                                        </td>
                                                        <td class="viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->purpose }}
                                                        </td>
                                                        <td class="viewdetails" data-id="{{ $datas->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#record-modal">
                                                            {{ $datas->initiation_date }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-sm" id="record-modal">
        <div class="modal-contain">
            <div class="modal-dialog m-0">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body " id="auditTableinfo">
                        <div class="block-page1">
                            <div class="recoder-number">Record No. 0001</div>
                            <div class="short-des">Short Description *</div>
                            <div class="change-control">EMRDS / Change Control</div>
                            <div class="status">Opened</div>
                        </div>

                        <div class="block-page1">
                            <div class="block-action">Actions</div>
                            <div class="drop-list">
                                <a href="#" class="block-list-item">View History</a>
                                <a href="#" class="block-list-item">Send Notication</a>
                                <div class="list-drop">
                                    <div class="block-list-item" onclick="show_hide()">
                                        <div class="run-report">Run Report</div>
                                        <div class="icon-bar">
                                            <i class="fa-solid fa-angle-down"></i>
                                        </div>
                                    </div>

                                    <div id="drop-lists">
                                        <a target="_blank" href="{{ asset('vaccination.pdf') }}"
                                            class="item">Vaccination Report</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
    <script>
        function show_hide() {
            var click = document.getElementById("drop-lists");
            if (click.style.display === "none") {
                click.style.display = "block";
            } else {
                click.style.display = "none";
            }
        }
    </script>
    <script type='text/javascript'></script>
@endsection
