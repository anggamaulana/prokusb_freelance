<?php

$q = sprintf("select c.id_cv as id,waktu,c.lastupdate,c.kontak,p.nama_provinsi from cv c,provinsi p where c.id_provinsi=p.id_provinsi and id_member=%d and ",
            mysql_real_escape_string($_GET['i']));
		$res=mysql_query($q);

?>
	<div id="page">	
	<div style="clear: both;">&nbsp;</div>

 <div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h2>
            List CV Member</h2>
       
        <div class="clearboth">
        </div>
        <div id="Pg386ContentContainer" style="">
            <div class="jobListFuncBar">
                

<div id="Pg386AddRemoveColPanel" class="bulletedFunc left ui-draggable" style="display: none; position: relative;">
    <div class="actionLayer">
        <div class="contentBody nopad">
            <div class="scrollBox h200">
                <div id="Pg386ContentContatiner" class="scrollPad">
                    <div class="formContent">
                        <ul id="Pg386targetall">
                            
                            <li>
                                <input id="Pg386targetall0" class="chkBox" disabled="disabled" checked="checked" value="1" name="Pg386targetall" type="checkbox">
                                Judul CV
                            </li>
                            
                            <li>
                                <input id="Pg386targetall1" class="chkBox" checked="checked" value="2" name="Pg386targetall" type="checkbox">
                                Dibuat Tanggal
                            </li>
                            
                            <li>
                                <input id="Pg386targetall2" class="chkBox" checked="checked" value="3" name="Pg386targetall" type="checkbox">
                                Terakhir Diupdate
                            </li>
                            
                            <li>
                                <input id="Pg386targetall3" class="chkBox" checked="checked" value="4" name="Pg386targetall" type="checkbox">
                                Status Persetujuan
                            </li>
                            
                            <li>
                                <input id="Pg386targetall4" class="chkBox" checked="checked" value="5" name="Pg386targetall" type="checkbox">
                                Level Privasi
                            </li>
                            
                            <li>
                                <input id="Pg386targetall5" class="chkBox" disabled="disabled" checked="checked" value="6" name="Pg386targetall" type="checkbox">
                                Status CV
                            </li>
                            
                            <li>
                                <input id="Pg386targetall6" class="chkBox" checked="checked" value="7" name="Pg386targetall" type="checkbox">
                                Unduh
                            </li>
                            
                            <li>
                                <input id="Pg386targetall7" class="chkBox" checked="checked" value="8" name="Pg386targetall" type="checkbox">
                                Langkah
                            </li>
                            
                        </ul>
                    </div>
                    <div class="clearboth">
                    </div>
                </div>
            </div>
        </div>
        <div class="formBtnSet">
            <input id="Pg386Cancel" value="Batalkan" class="greyBtn" type="button">
            <input id="Pg386Done" value="Selesai" class="blueBtn" type="button">
        </div>
    </div>
</div>
                <div class="clearboth">
                </div>
            </div>
            
<div id="Pg386_ResumeList" class="bgw">
    
<div id="Pg386Container"> <div>                   <table id="Pg386DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20"><thead><tr>  <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Dibuat Tanggal&nbsp;</a></th>     <th style="display: table-cell;" class="sortableCol" sortindex="C8"><a class="C8">Terakhir DiUpdate&nbsp;</a></th>      <th style="display: table-cell;" class="sortableCol sortD" sortindex="C15"><a class="C15">Nama&nbsp;</a></th>        <th style="display: table-cell;" class="sortableCol" sortindex="C2"><a class="C2">Alamat&nbsp;</a></th>        <th style="display: table-cell;" class="sortableCol" sortindex="C16"><a class="C16">Kontak&nbsp;</a></th>      <th style="display: table-cell;" class="sortableCol" sortindex="C20"><a class="C20">Provinsi&nbsp;</a></th>  </tr></thead>     <tbody> <tr>  <td style="display: table-cell;" width=""><a name="Pg386_Link_200003007542103_ID" id="Pg386_Link_200003007542103_ID" class="" onclick='var controllerResponsePg386_Link_200003007542103 = json_parse($("#controllerResponsePg386_Link_200003007542103_ID").val());controllerResponsePg386_Link_200003007542103.ActionUrl = "/Resumes/ResumeManagement?resumeId=200003007542103";controllerResponsePg386_Link_200003007542103.CountryCode =  "ID";JobsDB_System_Webflow.ControllerResponseExecutor(controllerResponsePg386_Link_200003007542103);'></a><textarea id="controllerResponsePg386_Link_200003007542103_ID" rows="0" cols="0" style="display: none;">
   </textarea> &nbsp;</td> </tr></tbody> </table>  <div id="Pg333Footer"></div> </div></div>
<div id="Pg333BodyContainer"></div></div>
                                             
</div>    
</div>
 
	<div class="otherRegionResume mT10">
      
        <h5 id="hidden_ID" class="pT3 pB3 hidden_Region" style="display:none;"><a style="cursor: pointer;" class="LoadResumeFrom" value="ID"><img class="flag" src="myjobsDB_CV_files/flag_ID.gif">View My resumes in&nbsp;Indonesia&nbsp;»</a></h5>

    </div>
	</div>