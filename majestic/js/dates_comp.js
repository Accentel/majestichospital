/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
            
function datescomp()
{
if(!(document.myform.joindt.value==""))
{
     var str1 = document.getElementById("joindt").value;//alert("joindt"+str1);//from
     var dt1  = parseInt(str1.substring(0,2),10);
     var mon1 = parseInt(str1.substring(3,5),10);
     var yr1  = parseInt(str1.substring(6,10),10);
     var date1 = new Date(yr1, mon1, dt1);

     var str3=document.getElementById("cur_dts").value;//alert('str3--'+str3)
     var dt3 = parseInt(str3.substring(0,2),10);
     var mon3 = parseInt(str3.substring(3,5),10);
     var yr3  = parseInt(str3.substring(6,10),10);
     var current_datefor = new Date(yr3, mon3, dt3);
if(date1 > current_datefor)
     {//alert("join Date--"+date1);alert("current_datefor--"+current_datefor)
         alert("Join Date Should be Less than Current Date");//To date cannot be greater than from date
         return false;
     }
 

}//joindt

if(!(document.myform.joindt.value=="") )
{
     var str2 = document.getElementById("dob").value;//alert("dob"+str2);
     var dt2  = parseInt(str2.substring(0,2),10);
     var mon2 = parseInt(str2.substring(3,5),10);
     var yr2  = parseInt(str2.substring(6,10),10);
     var date2 = new Date(yr2, mon2, dt2);


     var str3=document.getElementById("cur_dts").value;//alert('str3--'+str3)
     var dt3 = parseInt(str3.substring(0,2),10);
     var mon3 = parseInt(str3.substring(3,5),10);
     var yr3  = parseInt(str3.substring(6,10),10);
     var current_datefor = new Date(yr3, mon3, dt3);
if(date2 > current_datefor)
     {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
         alert("Date of Birth Should be Less than Current Date");//To date cannot be greater than from date
         return false;
     }



}//dob
if(!(document.myform.joindt.value=="") && !(document.myform.dob.value=="")){

     var str1 = document.getElementById("joindt").value;//alert("joindt"+str1);//from
     var dt1  = parseInt(str1.substring(0,2),10);
     var mon1 = parseInt(str1.substring(3,5),10);
     var yr1  = parseInt(str1.substring(6,10),10);
     var date1 = new Date(yr1, mon1, dt1);

     var str2 = document.getElementById("dob").value;//alert("dob"+str2);
     var dt2  = parseInt(str2.substring(0,2),10);
     var mon2 = parseInt(str2.substring(3,5),10);
     var yr2  = parseInt(str2.substring(6,10),10);
     var date2 = new Date(yr2, mon2, dt2);


     if(date1 <= date2)
     {//alert("Date of Birth--"+date2);alert("join Date--"+date1)
         alert("Join Date Should be Greater than Date of Birth");//To date cannot be greater than from date
         return false;
     }



var oneDay = 24*60*60*1000;	// hours*minutes*seconds*milliseconds
var firstDate = new Date(yr2, mon2, dt2);
var secondDate = new Date(yr1, mon1, dt1);
 
var diffDays = Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay));
var noofyrs=diffDays/365;//for years
//alert("diffDays--"+diffDays+"yrs--"+noofyrs);
if(noofyrs < 18)
{
alert("Minimum Age Difference Should be 18Yrs between Join date and Date of Birth" );
 return false;
}

 }//first if
}
function logs2()
{
    var st=document.myform.abc.value;
    if(st==1)
        {
            if(document.getElementById("loginname").value=="")
                {
                    alert("Please Enter Login Id");
                    document.getElementById("loginname").focus();
                    return false;
                }
                if(document.getElementById("pwd").value=="")
                    {
                    alert("Please Enter Password");
                    document.getElementById("pwd").focus();
                    return false;
                    }
        }
}

function getRef(str)
{ 
    //alert(str);
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
var url="ajax/getRef.jsp";
url=url+"?pnam="+str;
xmlHttp.onreadystatechange=stateChanged4;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}

function stateChanged4() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 	//var str=document.form.str.value
	     var showdata = xmlHttp.responseText;
            //alert(showdata);
            //var strar = showdata.split(":");
              //alert(strar);
             document.getElementById("reff").innerHTML=showdata;
	}
}
function GetXmlHttpObject()
{

var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}