<?php
include("config.php");
	 
	 
	    $n=$_REQUEST['searchname'];
		
		 $msql="select distinct a.pat_regno,pat_name,pat_no from h_ip_pat_admit a,h_patient_mast b where a.pat_regno=b.pat_regno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%') and UPPER(pat_name) like UPPER('"+searchname+"%')  group by a.pat_regno order by a.pat_regno desc ";

		 csql="select count(distinct a.pat_regno)  from h_ip_pat_admit a,h_patient_mast b where a.pat_regno=b.pat_regno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%') and UPPER(pat_name) like UPPER('"+searchname+"%') group by a.pat_regno order by a.pat_regno desc ";
		 
		 rs=st.executeQuery(csql);
		 while(rs.next()){
		 tot=rs.getInt(1);
		 }
		
	 }else{

	 msql="select distinct a.pat_regno,pat_name,pat_no from h_ip_pat_admit a,h_patient_mast b where a.pat_regno=b.pat_regno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%') group by a.pat_regno order by a.pat_regno desc ";
	 csql="select count(distinct a.pat_regno) from h_ip_pat_admit a,h_patient_mast b where a.pat_regno=b.pat_regno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%') group by a.pat_regno order by a.pat_regno desc";
		 		 
		 rs=st.executeQuery(csql);
		 while(rs.next()){
		 tot=rs.getInt(1);
		 }
	 
	 }
			rs=null;
			 //begin pop up
		int m=0; 
		ArrayList name=new ArrayList();
	 	rs=st.executeQuery("select distinct PAT_NAME  from h_ip_pat_admit a,h_patient_mast b where a.pat_regno=b.pat_regno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%')");
		while(rs.next()){
		name.add(m,rs.getString(1));
        m++;
		}
	
		 //end pop

	 %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="../js/actb.js"></script>
<script language="javascript" type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/sortable.js"></script>
<script type="text/javascript">window.onload=function(){tableruler();}</script>
<script>
var search_suggestions=new Array("<%for(int p=0;p!=m;p++){if(p==(m-1)){%><%=name.get(p)%><%}else{%><%=name.get(p)%>","<%}}%>");
//var custom2 = new Array('something','randomly','different');
//arraypop
</script>
<script type="text/javascript">

  function showDoc(str){
	  
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }//if
			  var url="dis_view25.jsp"
			  url=url+"?emp_id="+str;
       		  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		//alert(showdata);
		  var strar = trim(showdata).split("@");
		// alert(strar.length);
		  if(strar.length>0){
		  
		   var cop=eval(strar[7]);
		   var ca=eval(strar[9]);
		   var car=eval(strar[18]);
		   var q=eval(strar[38]);
			 var p1=eval(strar[39]);
			  var invg=eval(strar[41]);
			 var traet=eval(strar[40]);
			var ds=eval(strar[47]);
			var sd=eval(strar[68]);
			var dsd=eval(strar[70]);
			
			var sd2=eval(strar[74]);
			var bc=eval(strar[85]);var deathc=eval(strar[99]);
				
		  opener.document.getElementById("patno").value=strar[1];
		  opener.document.getElementById("regno").innerHTML=strar[2];
		  opener.document.getElementById("pataddr").innerHTML=strar[4];
		  opener.document.getElementById("patphone").value=strar[5];
		  opener.document.getElementById("patgar").value=strar[3];
		  //opener.document.getElementById("patdbno").value=strar[6];
		
			  if(ca==0){ 
			
			    opener.document.getElementById("ad_notes").innerHTML="----";
				 	  }else{ 
					  opener.document.getElementById("ad_notes").innerHTML=strar[8];
				  opener.document.getElementById("dt").value=strar[19];
				    }
				  if(car==0){ 
				    opener.document.getElementById("prdiag").innerHTML="----";
					opener.document.getElementById("fidiag").innerHTML="----";
					opener.document.getElementById("comp").innerHTML="----";
				    opener.document.getElementById("oppro").innerHTML="----";
					
					opener.document.getElementById("deptref").innerHTML="----";
				    opener.document.getElementById("death").innerHTML="----";
					opener.document.getElementById("check").checked=false;
				  }else{ 
				     opener.document.getElementById("prdiag").innerHTML=strar[10];
					opener.document.getElementById("fidiag").innerHTML=strar[11];
					opener.document.getElementById("comp").innerHTML=strar[12];
				    opener.document.getElementById("oppro").innerHTML=strar[13];
					opener.document.getElementById("deptref").innerHTML=strar[14];
				    opener.document.getElementById("death").innerHTML=strar[16];
					opener.document.getElementById("ar_dt").value=strar[20];
					opener.document.getElementById("check").checked=true;
				  }
        	
       // opener.document.getElementById("admittable").innerHTML=strar[22];
		opener.document.getElementById("admittable1").innerHTML=strar[22];		
		opener.document.getElementById("admittable2").innerHTML=strar[23];		
		opener.document.getElementById("admittable4").innerHTML=strar[24];		
		if(q==1){opener.document.getElementById("diagno").innerHTML="<font color='#F04E00' size='2'>No Diagnostics </font>";
		}else{
		opener.document.getElementById("diagno").innerHTML=strar[25];		}
		opener.document.getElementById("progressnotes").innerHTML=strar[26];		
		opener.document.getElementById("nurserecord").innerHTML=strar[27];		
		opener.document.getElementById("iproomtransfer").innerHTML=strar[28];
		opener.document.getElementById("birthrecords").innerHTML=strar[29];
		opener.document.getElementById("vbirthrecords").innerHTML=strar[30];
		opener.document.getElementById("intakerecord").innerHTML=strar[31];
		opener.document.getElementById("outputrecord").innerHTML=strar[32];
		opener.document.getElementById("bedsideproc").innerHTML=strar[33];
		opener.document.getElementById("operationalSurgical").innerHTML=strar[34];
		if(dsd==1){
		 opener.document.getElementById("doctorname").innerHTML="---";
		 }else{
		 opener.document.getElementById("doctorname").innerHTML=strar[35];
		
		 }
		/*if(traet==1){
		
		opener.document.getElementById("specialproc").innerHTML="---";
		}else{
		
		opener.document.getElementById("specialproc").innerHTML=strar[37];
		}*/
		 	
		if(invg==1){
		opener.document.getElementById("invgitmaname").innerHTML="---";
		}else{
		opener.document.getElementById("invgitmaname").innerHTML=strar[37];
		}
			
		if(ds==1){
		opener.document.getElementById("history_ds").innerHTML=strar[43];
		opener.document.getElementById("cf").innerHTML=strar[44];
		opener.document.getElementById("ch").innerHTML=strar[45];
		opener.document.getElementById("ta").innerHTML=strar[46];
		  opener.document.getElementById("patno1").value=strar[75];
		}else{
		opener.document.getElementById("history_ds").innerHTML=" ";
		opener.document.getElementById("cf").innerHTML=" ";
		opener.document.getElementById("ch").innerHTML=" ";
		opener.document.getElementById("ta").innerHTML=" ";
		 opener.document.getElementById("patno1").value=strar[75];
		}
		
		if(sd==1){
		
		opener.document.getElementById("pod").innerHTML=strar[49];
		opener.document.getElementById("post_od").innerHTML=strar[50];
		opener.document.getElementById("pd").innerHTML=strar[51];
		opener.document.getElementById("sur_na").value=strar[52];
		opener.document.getElementById("ncs").value=strar[53];
		opener.document.getElementById("na").value=strar[54];
		opener.document.getElementById("na1").value=strar[55];
		opener.document.getElementById("na2").value=strar[56];
		opener.document.getElementById("na3").value=strar[57];
		opener.document.getElementById("na4").value=strar[58];
		opener.document.getElementById("sur_notes").innerHTML=strar[59];
		opener.document.getElementById("op_find").innerHTML=strar[60];
		opener.document.getElementById("an_notes").innerHTML=strar[61];
		opener.document.getElementById("op_dt").value=strar[62];
		opener.document.getElementById("sttime").value=strar[63];
		opener.document.getElementById("endtime").value=strar[64];
		opener.document.getElementById("ot").innerHTML=strar[71];
		opener.document.getElementById("stime1").value=strar[66];
		opener.document.getElementById("etime1").value=strar[67];
		opener.document.getElementById("ot_cost").value=strar[76];
		
		//opener.document.getElementById("ot_cost").checked=true;
		}else{
		
		opener.document.getElementById("pod").innerHTML=" ";
		opener.document.getElementById("post_od").innerHTML=" ";
		opener.document.getElementById("pd").innerHTML=" ";
		opener.document.getElementById("sur_na").value=" ";
		opener.document.getElementById("ncs").value=" ";
		opener.document.getElementById("na").value=" ";
		opener.document.getElementById("na1").value=" ";
		opener.document.getElementById("na2").value=" ";
		opener.document.getElementById("na3").value=" ";
		opener.document.getElementById("na4").value=" ";
		opener.document.getElementById("ot_cost").value="0";
		//opener.document.getElementById("ot_cost").checked=true;
		opener.document.getElementById("sur_notes").innerHTML=" ";
		opener.document.getElementById("op_find").innerHTML=" ";
		opener.document.getElementById("an_notes").innerHTML=" ";
		}
		if(sd2==1){
		opener.document.getElementById("Review").value=strar[72];
		opener.document.getElementById("treating").value=strar[73];
		opener.document.getElementById("tg").value=strar[77];
		}else{
		opener.document.getElementById("Review").value=" ";
		opener.document.getElementById("treating").value=" ";
		}
		
		/////////////Birth Certificate///////////////
		//alert(bc);
		if(bc==0)
		{
		opener.document.getElementById("main_div").style.display='none';
		opener.document.getElementById("div2").style.display='';
		opener.document.getElementById("div2").innerHTML="<font color='#F04E00' size='2'>No Records </font>";
		}
		 if(bc>1){
	
		opener.document.getElementById("wife").value=strar[78];
		opener.document.getElementById("motaddress").innerHTML=strar[4];
		opener.document.getElementById("po").value=strar[79];
		opener.document.getElementById("ps").value=strar[80];
		opener.document.getElementById("Dist").value=strar[81];
		opener.document.getElementById("weight").value=strar[100];
		
		if(strar[83]=="lscs"){
			opener.document.getElementById("delby1").checked=true;
			opener.document.getElementById("delby2").checked=false;
			 }else{
			opener.document.getElementById("delby1").checked=false;
			opener.document.getElementById("delby2").checked=true;
			 } 
			
			 if(strar[84]=="Female"){
			opener.document.getElementById("Female").checked=true;
			opener.document.getElementById("Male").checked=false;
			 }else{
			opener.document.getElementById("Female").checked=false;
			opener.document.getElementById("Male").checked=true;
			 } 
			
		opener.document.getElementById("BirthDate").value=strar[84];
				
		}else{
		
		opener.document.getElementById("wife").value=" ";
		opener.document.getElementById("motaddress").innerHTML=strar[4];
		opener.document.getElementById("po").value=" ";
		opener.document.getElementById("ps").value=" ";
		opener.document.getElementById("Dist").value=" ";
		
		}
		/////////////for Death Certificate///////////////
		if(deathc>0){
		opener.document.getElementById("Religion").value=strar[86];
		opener.document.getElementById("Nationality").value=strar[87];
		
		if(strar[89]=="M"){
	
			opener.document.getElementById("M").checked=true;
			opener.document.getElementById("U").checked=false;
			 }else{
			
			opener.document.getElementById("M").checked=false;
			opener.document.getElementById("U").checked=true;
			 } 	
		opener.document.getElementById("ps1").value=strar[89];
		opener.document.getElementById("dodeath").value=strar[90];
		opener.document.getElementById("doadmit").value=strar[98];
		opener.document.getElementById("Disease").innerHTML=strar[91];
		opener.document.getElementById("cofdeath").innerHTML=strar[92];
		opener.document.getElementById("nameofrec").value=strar[93];
		opener.document.getElementById("MO").value=strar[94];
		opener.document.getElementById("Reciver").value=strar[95];
		opener.document.getElementById("phnorec").value=strar[96];
		opener.document.getElementById("dateofrec").value=strar[97];
		
		}else{
		
		opener.document.getElementById("Religion").value=" ";
		opener.document.getElementById("Nationality").value=" ";
		opener.document.getElementById("ps1").value=" ";
		opener.document.getElementById("doadmit").value=strar[102];
		opener.document.getElementById("Disease").innerHTML=" ";
		opener.document.getElementById("cofdeath").innerHTML=" ";
		opener.document.getElementById("nameofrec").value=" ";
		opener.document.getElementById("MO").value=" ";;
		opener.document.getElementById("Reciver").value=" ";
		opener.document.getElementById("phnorec").value=" ";
		}
		///////////////////for whose patient in ot table////////////
				
		opener.document.getElementById('tr1').style.display='none';
   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
  </script>
<title>Hospital Management System</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<form name="docpat" action="dis_view.jsp" autocomplete="off">
<table><tr><td>
  <div align="center">
<tr>
    <table width="500px" border="0" cellspacing="1" cellpadding="1">
               <tr>
                  <td width="118" class="label1">&nbsp;</td>
                 
                  <td width="663" class="label1" ><div align="right">
                    
                    Search By Patient Name:</div></td>
                  <td width="153"><input name="searchname" type="text" class="textbox1" id="searchingpop" />
                  </td>
                                     <script>
							        var obj = actb(document.getElementById('searchingpop'),search_suggestions);
									</script>
  <td width="45"><input name="image" type="image" src="../images/go1.gif" width="41" height="20" border="0"/></td>
      </tr>
    </table></tr>
<tr></tr>
<tr></tr>
<!-------------------------------------------->
<tr align="center">
<table width="500px" class="sortable"  id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Patient Reg No </div></th>
        <th class="TH1">Patient Name</th>
          
    </tr>
  </thead>
  <tbody class="box_midlebg">
    <%   String patname=null;
         String patcode=null;               
         rs=st.executeQuery(msql);
		 while(rs.next()){
			 patregno=rs.getString(1);
			 pataddate=rs.getString(2);
		 records++;
         remainig_records = remainig_records + 1;//0
         rowscounts++;//1
         if (rowstart <= rowend && remainig_records == rowstart) {
         rowstart++;
         rowscounts = 0;	
%>
    <tr class="tr1">                   <input type="hidden" name="c" value="<%=records%>">

      <td class="TD1"><input type="radio" name="empid" value="<%=rs.getString(3)%>" onclick="javascript:showDoc(this.value);"/>        <%=rs.getString(1)%></td>
	
        <td class="TD1"><%=rs.getString(2)%></td>

    
    </tr>

    <%  }//if rows
					}//while

%>
							               
					<%if(records==0){//out.print("records-===-"+records);
						%>

    <tr>
      <td colspan="6"><div align="center" ><font color="red">No Records Found</font></div></td>
    </tr>
    <%}%>
  </tbody>
</table>
</tr>
<!-------------------------------------------->
<tr>
<table width="500px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="813"> <div align="center">
      <!--<input type="button" name="aaa" value="Select" class="butnbg1" onclick="javascript:showDoc();">-->
    </div></td>
    <td width="34" align="left"></td>
    <td width="25" align="right"><% if (!(pagecount == 0)) {%>
        <a href="dis_view.jsp?next=0" >
        <%}%>
        <img src="../images/first.gif" alt="First" width="16" height="14" /></a></td>
    <td width="10">&nbsp;</td>
    <td width="25" align="right"><% if (!(pagecount == 0)) {%>
        <a  href="dis_view.jsp?next=<%=(pagecount - 1)%>&amp;searchname=<%=searchname%>&amp;gname=<%=gname%>">
        <%}%>
        <img src="../images/previous.gif" alt="Previous" width="16" height="14" /></a></td>
    <td width="10">&nbsp;</td>
    <td width="25" align="right"><% if (rowscounts > 0) {%>
        <a href="dis_view.jsp?next=<%=pagecount + 1%>&amp;searchname=<%=searchname%>&amp;gname=<%=gname%>">
        <%}%>
        <img src="../images/next.gif" alt="Next" width="16" height="14" /></a></td>
    <td width="10">&nbsp;</td>
    <td width="25" align="right"><% if (rowscounts > 0) {%>
        <a href="dis_view.jsp?next=<%=((records - 1) / nd)%>&amp;searchname=<%=searchname%>&amp;gname=<%=gname%>" >
        <%}%>
        <img src="../images/last.gif" alt="Last" width="16" height="14" /></a></td>
  </tr>
<% if (rowscounts == 0) {%>
            <tr>
              <td align="right" colspan="10"><font color="#FF6600">No More Records</font></td>
            </tr>
            <%}%>
</table>

</tr>
<tr>
  <div align="right"><a href="javascript:window.close()"><b><font color="#FF6600">Close</font></b></a></div>
</tr>
  </div></td></tr></table>

</form>
</body>
</html>
<%
con.commit();
}//try
catch(Exception e)
{
	 out.println(e);
 }
finally
{
	 rs.close();
	 st.close();
	 con.close();
}

%>