/*
var ALERT_TITLE = "Oops!";
var ALERT_BUTTON_TEXT = "Ok";

// over-ride the alert method only if this a newer browser.
// Older browser will see standard alerts
if(document.getElementById) {
	window.alert = function(txt) {
		createCustomAlert(txt);
	}
}

function createCustomAlert(txt) {
	// shortcut reference to the document object
	d = document;

	// if the modalContainer object already exists in the DOM, bail out.
	if(d.getElementById("modalContainer")) return;

	// create the modalContainer div as a child of the BODY element
	mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
	mObj.id = "modalContainer";
	 // make sure its as tall as it needs to be to overlay all the content on the page
	mObj.style.height = document.documentElement.scrollHeight + "px";

	// create the DIV that will be the alert 
	alertObj = mObj.appendChild(d.createElement("div"));
	alertObj.id = "alertBox";
	// MSIE doesnt treat position:fixed correctly, so this compensates for positioning the alert
	if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	// center the alert box
	alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";

	// create an H1 element as the title bar
	h1 = alertObj.appendChild(d.createElement("h1"));
	h1.appendChild(d.createTextNode(ALERT_TITLE));

	// create a paragraph element to contain the txt argument
	msg = alertObj.appendChild(d.createElement("p"));
	msg.innerHTML = txt;
	
	// create an anchor element to use as the confirmation button.
	btn = alertObj.appendChild(d.createElement("a"));
	btn.id = "closeBtn";
	btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
	btn.href = "#";
	// set up the onclick event to remove the alert when the anchor is clicked
	btn.onclick = function() { removeCustomAlert();return false; }

	
}

// removes the custom alert from the DOM
function removeCustomAlert() {
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
*/


/*
  -------------------------------------------------------------------------
		      JavaScript Form Validator (gen_validatorv31.js)
              Version 3.1.2
	Copyright (C) 2003-2008 JavaScript-Coder.com. All rights reserved.
	You can freely use this script in your Web pages.
	You may adapt this script for your own needs, provided these opening credit
    lines are kept intact.
		
	The Form validation script is distributed free from JavaScript-Coder.com
	For updates, please visit:
	http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
	
	Questions & comments please send to form.val at javascript-coder.com
  -------------------------------------------------------------------------  
*/
function Validator(frmname)
{//alert(1)


  this.formobj=document.forms[frmname];
	if(!this.formobj)
	{
	  alert("Error: couldnot get Form object "+frmname);
		return;
	}
	if(this.formobj.onsubmit)
	{
	 this.formobj.old_onsubmit = this.formobj.onsubmit;
   	 this.formobj.onsubmit=null;
	}
	else
	{
	 this.formobj.old_onsubmit = null;
	}
	this.formobj._sfm_form_name=frmname;
	this.formobj.onsubmit=form_submit_handler;
	this.addValidation = add_validation;
	this.setAddnlValidationFunction=set_addnl_vfunction;
	this.clearAllValidations = clear_all_validations;
    this.disable_validations = false;//new
    document.error_disp_handler = new sfm_ErrorDisplayHandler();
    this.EnableOnPageErrorDisplay=validator_enable_OPED;
	this.EnableOnPageErrorDisplaySingleBox=validator_enable_OPED_SB;
    this.show_errors_together=true;
    this.EnableMsgsTogether=sfm_enable_show_msgs_together;
    document.set_focus_onerror=true;
    this.EnableFocusOnError=sfm_validator_enable_focus;

}
/*function Validator11(frmname)
{//alert("own"+1)
	
  this.formobj=document.forms[frmname];
if(!this.formobj)
	{
	  alert("Error: couldnot get Form object "+frmname);
		return;
	}
	if(this.formobj.click)
	{
	 this.formobj.old_click = this.formobj.click;
  	 this.formobj.click=null;
	}
	else
	{
 this.formobj.click = null;
	}
	this.formobj._sfm_form_name=frmname;
	this.formobj.click=form_submit_handler;
	this.addValidation = add_validation;
	this.setAddnlValidationFunction=set_addnl_vfunction;
	this.clearAllValidations = clear_all_validations;
    this.disable_validations = false;//new
    document.error_disp_handler = new sfm_ErrorDisplayHandler();
    this.EnableOnPageErrorDisplay=validator_enable_OPED;
	this.EnableOnPageErrorDisplaySingleBox=validator_enable_OPED_SB;
    this.show_errors_together=true;
    this.EnableMsgsTogether=sfm_enable_show_msgs_together;
    document.set_focus_onerror=true;
    this.EnableFocusOnError=sfm_validator_enable_focus;

	}*/

function sfm_validator_enable_focus(enable)
{//alert(2)
    document.set_focus_onerror = enable;
}

function set_addnl_vfunction(functionname)
{//alert(3)
  this.formobj.addnlvalidation = functionname;
}

function sfm_set_focus(objInput)
{//alert(4)
    if(document.set_focus_onerror)
    {
        objInput.focus();
    }
}

function sfm_enable_show_msgs_together()
{//alert(5)
    this.show_errors_together=true;
    this.formobj.show_errors_together=true;
}
function clear_all_validations()
{//alert(6)
	for(var itr=0;itr < this.formobj.elements.length;itr++)
	{
		this.formobj.elements[itr].validationset = null;
	}
}

function form_submit_handler()
{//alert(7)
   var bRet = true;
    document.error_disp_handler.clear_msgs();
	for(var itr=0;itr < this.elements.length;itr++)
	{
		if(this.elements[itr].validationset &&
	   !this.elements[itr].validationset.validate())
		{
		  bRet = false;
		}
        if(!bRet && !this.show_errors_together)
        {
          break;

        }
	}

	if(this.addnlvalidation)
	{
	  str =" var ret = "+this.addnlvalidation+"()";
	  eval(str);

     if(!ret) 
     {
       bRet=false; 
     }

	}

   if(!bRet)
    {
      document.error_disp_handler.FinalShowMsg();
      return false;
    }
	return true;
}

function add_validation(itemname,descriptor,errstr)
{//alert(8)
	var condition = null;
	if(arguments.length > 3)
	{
	 condition = arguments[3]; 
	}
  if(!this.formobj)
	{
		alert("Error: The form object is not set properly");
		return;
	}//if
	var itemobj = this.formobj[itemname];
    if(itemobj.length && isNaN(itemobj.selectedIndex) )
    //for radio button; don't do for 'select' item
	{
		itemobj = itemobj[0];
	}	
  if(!itemobj)
	{
		alert("Error: Couldnot get the input object named: "+itemname);
		return;
	}
	if(!itemobj.validationset)
	{
		itemobj.validationset = new ValidationSet(itemobj,this.show_errors_together);
	}
	itemobj.validationset.add(descriptor,errstr,condition);
    itemobj.validatorobj=this;
}
function validator_enable_OPED()
{//alert(9)
    document.error_disp_handler.EnableOnPageDisplay(false);
}

function validator_enable_OPED_SB()
{//alert(10)
	document.error_disp_handler.EnableOnPageDisplay(true);
}
function sfm_ErrorDisplayHandler()
{//alert(11)
  this.msgdisplay = new alertMsgDisplayer();
  this.EnableOnPageDisplay= edh_EnableOnPageDisplay;
  this.ShowMsg=edh_ShowMsg;
  this.FinalShowMsg=edh_FinalShowMsg;
  this.all_msgs=new Array();
  this.clear_msgs=edh_clear_msgs;
}
function edh_clear_msgs()
{//alert(12)
    this.msgdisplay.clearmsg(this.all_msgs);
    this.all_msgs = new Array();
}
function edh_FinalShowMsg()
{//alert(13)
    this.msgdisplay.showmsg(this.all_msgs);
}
function edh_EnableOnPageDisplay(single_box)
{//alert(14)
	if(true == single_box)
	{
		this.msgdisplay = new SingleBoxErrorDisplay();
	}
	else
	{
		this.msgdisplay = new DivMsgDisplayer();		
	}
}
function edh_ShowMsg(msg,input_element)
{//alert(15)
	
   var objmsg = new Array();
   objmsg["input_element"] = input_element;
   objmsg["msg"] =  msg;
   this.all_msgs.push(objmsg);
}
function alertMsgDisplayer()
{//alert(16)
  this.showmsg = alert_showmsg;
  this.clearmsg=alert_clearmsg;
}
function alert_clearmsg(msgs)
{//alert(17)

}
function alert_showmsg(msgs)
{//alert(18)
    var whole_msg="";
    var first_elmnt=null;
    for(var m=0;m < msgs.length;m++)
    {
        if(null == first_elmnt)
        {
            first_elmnt = msgs[m]["input_element"];
        }
        whole_msg += msgs[m]["msg"] + "\n";
    }
	
    alert(whole_msg);

    if(null != first_elmnt)
    {
        sfm_set_focus(first_elmnt);
    }
}
function sfm_show_error_msg(msg,input_elmt)
{//alert(19)
    document.error_disp_handler.ShowMsg(msg,input_elmt);
}
function SingleBoxErrorDisplay()
{//alert(20)
 this.showmsg=sb_div_showmsg;
 this.clearmsg=sb_div_clearmsg;
}

function sb_div_clearmsg(msgs)
{//alert(21)
	var divname = form_error_div_name(msgs);
	show_div_msg(divname,"");
}

function sb_div_showmsg(msgs)
{//alert(22)
	var whole_msg="<ul class='error_strings1'>\n";
	for(var m=0;m < msgs.length;m++)
    {
        whole_msg += "<li>" + msgs[m]["msg"] + "</li>\n";
    }
	whole_msg += "</ul>";
	var divname = form_error_div_name(msgs);
	show_div_msg(divname,whole_msg);
}
function form_error_div_name(msgs)
{//alert(23)
	var input_element= null;

	for(var m in msgs)
	{
	 input_element = msgs[m]["input_element"];
	 if(input_element){break;}
	}

	var divname ="";
	if(input_element)
	{
	 divname = input_element.form._sfm_form_name + "_errorloc";
	}

	return divname;
}
function DivMsgDisplayer()
{//alert(24)
 this.showmsg=div_showmsg;
 this.clearmsg=div_clearmsg;
}
function div_clearmsg(msgs)
{//alert(25)
    for(var m in msgs)
    {
        var divname = element_div_name(msgs[m]["input_element"]);
        show_div_msg(divname,"");
    }
}
function element_div_name(input_element)
{//alert(26)
  var divname = input_element.form._sfm_form_name + "_" + 
                   input_element.name + "_errorloc";

  divname = divname.replace(/[\[\]]/gi,"");

  return divname;
}
function div_showmsg(msgs)
{//alert(27)
    var whole_msg;
    var first_elmnt=null;
    for(var m in msgs)
    {
        if(null == first_elmnt)
        {
            first_elmnt = msgs[m]["input_element"];
        }
        var divname = element_div_name(msgs[m]["input_element"]);
        show_div_msg(divname,msgs[m]["msg"]);
    }
    if(null != first_elmnt)
    {
        sfm_set_focus(first_elmnt);
    }
}
function show_div_msg(divname,msgstring)
{//alert(28)
	if(divname.length<=0) return false;

	if(document.layers)
	{
		divlayer = document.layers[divname];
        if(!divlayer){return;}
		divlayer.document.open();
		divlayer.document.write(msgstring);
		divlayer.document.close();
	}
	else
	if(document.all)
	{
		divlayer = document.all[divname];
        if(!divlayer){return;}
		divlayer.innerHTML=msgstring;
	}
	else
	if(document.getElementById)
	{
		divlayer = document.getElementById(divname);
        if(!divlayer){return;}
		divlayer.innerHTML =msgstring;
	}
	divlayer.style.visibility="visible";	
}

function ValidationDesc(inputitem,desc,error,condition)
{//alert(29)
  this.desc=desc;
	this.error=error;
	this.itemobj = inputitem;
	this.condition = condition;
	this.validate=vdesc_validate;
}
function vdesc_validate()
{//alert(30)
	if(this.condition != null )
	{
		if(!eval(this.condition))
		{
			return true;
		}
	}
	if(!validateInput(this.desc,this.itemobj,this.error))
	{
		this.itemobj.validatorobj.disable_validations=true;

		sfm_set_focus(this.itemobj);

		return false;
	}
	return true;
}
function ValidationSet(inputitem,msgs_together)
{//alert(31)
    this.vSet=new Array();
	this.add= add_validationdesc;
	this.validate= vset_validate;
	this.itemobj = inputitem;
    this.msgs_together = msgs_together;
}
function add_validationdesc(desc,error,condition)
{//alert(32)
  this.vSet[this.vSet.length]= 
  new ValidationDesc(this.itemobj,desc,error,condition);
}
function vset_validate()
{//alert(33)
    var bRet = true;
    for(var itr=0;itr<this.vSet.length;itr++)
    {
        bRet = bRet && this.vSet[itr].validate();
        if(!bRet && !this.msgs_together)
        {
            break;
        }
    }
    return bRet;
}
function validateEmail(email)
{//alert(34)
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
return false;
}

function IsCheckSelected(objValue,chkValue)
{//alert(35)
    var selected=false;
	var objcheck = objValue.form.elements[objValue.name];
    if(objcheck.length)
	{
		var idxchk=-1;
		for(var c=0;c < objcheck.length;c++)
		{
		   if(objcheck[c].value == chkValue)
		   {
		     idxchk=c;
			 break;
		   }//if
		}//for
		if(idxchk>= 0)
		{
		  if(objcheck[idxchk].checked=="1")
		  {
		    selected=true;
		  }
		}//if
	}
	else
	{
		if(objValue.checked == "1")
		{
			selected=true;
		}//if
	}//else	

	return selected;
}
function TestDontSelectChk(objValue,chkValue,strError)
{//alert(36)
	var pass = true;
	pass = IsCheckSelected(objValue,chkValue)?false:true;

	if(pass==false)
	{
     if(!strError || strError.length ==0) 
        { 
        	strError = "Can't Proceed as you selected "+objValue.name;  
        }//if			  
	  sfm_show_error_msg(strError,objValue);
	  
	}
    return pass;
}




function TestShouldSelectChk(objValue,chkValue,strError)
{//alert(37)
	var pass = true;

	pass = IsCheckSelected(objValue,chkValue)?true:false;

	if(pass==false)
	{
     if(!strError || strError.length ==0) 
        { 
        	strError = "You should select "+objValue.name;  
        }//if			  
	  sfm_show_error_msg(strError,objValue);
	  
	}
    return pass;
}
function TestRequiredInput(objValue,strError)
{//alert(38)
 var ret = true;
 var val = objValue.value;
 val = val.replace(/^\s+|\s+$/g,"");//trim
    if(eval(val.length) == 0) 
    { 
       if(!strError || strError.length ==0) 
       { 
         strError = objValue.name + " : Required Field"; 
       }//if 
       sfm_show_error_msg(strError,objValue); 
       ret=false; 
    }//if 
return ret;
}


function TestMaxLen(objValue,strMaxLen,strError)
{//alert(39)
 var ret = true;
    if(eval(objValue.value.length) > eval(strMaxLen)) 
    { 
      if(!strError || strError.length ==0) 
      { 
        strError = objValue.name + " : "+ strMaxLen +" characters maximum "; 
      }//if 
      sfm_show_error_msg(strError,objValue); 
      ret = false; 
    }//if 
return ret;
}
function TestMinLen(objValue,strMinLen,strError)
{//alert(40)
 var ret = true;
 ////alert(objValue.name+"     "+objValue.value.length);
 ////alert(strMinLen);
    if(eval(objValue.value.length) <  eval(strMinLen) && eval(objValue.value.length) >=1) 
    { 
      if(!strError || strError.length ==0) 
      { 
        strError = objValue.name + " : " + strMinLen + " characters minimum  "; 
      }//if               
      sfm_show_error_msg(strError,objValue); 
      ret = false;   
    }//if 
return ret;
}
function TestInputType(objValue,strRegExp,strError,strDefaultError)
{//alert(41)
   var ret = true;

    var charpos = objValue.value.search(strRegExp); 
	////alert(charpos)
	////alert(strRegExp)
    if(objValue.value.length > 0 &&  charpos>=0 )
    {
     if(!strError || strError.length ==0) 
      { 
        strError = strDefaultError;
      }//if 
      sfm_show_error_msg(strError,objValue); 
      ret = false; 
    }//if

 return ret;
}


/****************************-------------Date-----------------****************/
function TestDate(objValue,strError,strDefaultError)
{
	var ret = true;
	var S=objValue.value
	var reDate = /(?:0[1-9]|[12][0-9]|3[01])\/(?:0[1-9]|1[0-2])\/(?:19|20\d{2})/;
    var charpos=reDate.test(S);
    if(objValue.value.length > 0 )
    { if (!charpos){
     if(!strError || strError.length ==0) 
      { 
        strError = strDefaultError;
      }//if 
      sfm_show_error_msg(strError,objValue); 
      ret = false; 
    }//if 
	}//if-1
 return ret;

}
//////////////////////////////////////////////////////////
/*
function TestDateLessThanToday(objValue,strError)
{
        var ret = true;
        if(objValue.value.length > 0 && Date.parse(objValue.value) > new Date())
        { 
            if(!strError || strError.length ==0) 
            { 
              strError = objValue.name + " : value should be less than today "; 
            }//if               
    sfm_show_error_msg(strError,objValue); 
    ret = false;                 
   }//if   
return ret;          
}

function TestDateGreaterThan(objValue,strError)
{//alert("in");
        var ret = true;

        var itemobj = document.forms.solutionprofile.getElementsByName("sapCertSince");
//alert("itemobj--"+itemobj);
        if(!itemobj)
    {
      //alert("BUG: Couldnot get the input object named: "+itemname);
            ret = false;                 
        return ret;
    }
        if(Date.parse(objValue.value) < Date.parse(itemobj.value))
        { 
            if(!strError || strError.length ==0) 
            { 
              strError = objValue.name + " : value should be greater than SAP certified date"; 
            }//if               
    sfm_show_error_msg(strError,objValue); 
    ret = false;                 
   }//if   
return ret;          
}
*/
////////////////////////////////////////////////////////////////
function TestTIME(objValue,strError,strDefaultError)
{

	var ret = true;
	var S=objValue.value
	var reDate1 = /([01][012]:[0-5][0-9])\s((am)|(pm)|(AM)|(PM))/;
    var charpos=reDate1.test(S);
    if(objValue.value.length > 0 )
    { if (!charpos){
     if(!strError || strError.length ==0) 
      { 
        strError = strDefaultError;
      }//if 
      sfm_show_error_msg(strError,objValue); 
      ret = false; 
    }//if 
	}//if-1
 return ret;

}
/****************************-------------time-----------------****************/
function TestEmail(objValue,strError)
{//alert(42)
var ret = true;
     if(objValue.value.length > 0 && !validateEmail(objValue.value)	 ) 
     { 
       if(!strError || strError.length ==0) 
       { 
          strError = objValue.name+": Enter a valid Email address "; 
       }//if                                               
       sfm_show_error_msg(strError,objValue); 
       ret = false; 
     }//if 
return ret;
}
function TestLessThan(objValue,strLessThan,strError)
{//alert(43)
var ret = true;
	  if(isNaN(objValue.value)) 
	  { 
	    sfm_show_error_msg(objValue.name +": Should be a number ",objValue); 
	    ret = false; 
	  }//if 
	  else
	  if(eval(objValue.value) >=  eval(strLessThan)) 
	  { 
	    if(!strError || strError.length ==0) 
	    { 
	      strError = objValue.name + " : value should be less than "+ strLessThan; 
	    }//if               
	    sfm_show_error_msg(strError,objValue); 
	    ret = false;                 
	   }//if   
return ret;          
}
function TestGreaterThan(objValue,strGreaterThan,strError)
{//alert(44)
var ret = true;
     if(isNaN(objValue.value)) 
     { 
       sfm_show_error_msg(objValue.name+": Should be a number ",objValue); 
       ret = false; 
     }//if 
	 else
     if(eval(objValue.value) <=  eval(strGreaterThan)) 
      { 
        if(!strError || strError.length ==0) 
        { 
          strError = objValue.name + " : value should be greater than "+ strGreaterThan; 
        }//if               
        sfm_show_error_msg(strError,objValue);  
        ret = false;
      }//if  
return ret;           
}
function TestRegExp(objValue,strRegExp,strError)
{//alert(45)
var ret = true;
    if( objValue.value.length > 0 && 
        !objValue.value.match(strRegExp) ) 
    { 
      if(!strError || strError.length ==0) 
      { 
        strError = objValue.name+": Invalid characters found "; 
      }//if                                                               
      sfm_show_error_msg(strError,objValue); 
      ret = false;                   
    }//if 
return ret;
}
function TestDontSelect(objValue,dont_sel_index,strError)
{//alert(46)
var ret = true;
    if(objValue.selectedIndex == null) 
    { 
      sfm_show_error_msg("ERROR: dontselect command for non-select Item"); 
      ret =  false; 
    } 
    if(objValue.selectedIndex == eval(dont_sel_index)) 
    { 
     if(!strError || strError.length ==0) 
      { 
      strError = objValue.name+": Please Select one option "; 
      }//if                                                               
      sfm_show_error_msg(strError,objValue); 
      ret =  false;                                   
     } 
return ret;
}
function TestSelectOneRadio(objValue,strError)
{//alert(47)
	var objradio = objValue.form.elements[objValue.name];
	var one_selected=false;
	for(var r=0;r < objradio.length;r++)
	{
	  if(objradio[r].checked)
	  {
	  	one_selected=true;
		break;
	  }
	}
	if(false == one_selected)
	{
      if(!strError || strError.length ==0) 
       {
	    strError = "Please select one option for  "+objValue.name;
	   }	
	  sfm_show_error_msg(strError,objValue);
	}
return one_selected;
}

function validateInput(strValidateStr,objValue,strError) 
{ //alert(48)
    var ret = true;
    var epos = strValidateStr.search("="); 
    var  command  = ""; 
    var  cmdvalue = ""; 
    if(epos >= 0) 
    { 
     command  = strValidateStr.substring(0,epos); 
     cmdvalue = strValidateStr.substr(epos+1); 
    } 
    else 
    { 
     command = strValidateStr; 
    } 
    switch(command) 
    { 
        case "req": 
        case "required": 
         { 
		   ret = TestRequiredInput(objValue,strError)
           break;             
         }//case required 
        case "maxlength": 
        case "maxlen": 
          { 
			 ret = TestMaxLen(objValue,cmdvalue,strError)
             break; 
          }//case maxlen 
        case "minlength": 
        case "minlen": 
           { 
			 ret = TestMinLen(objValue,cmdvalue,strError)
             break; 
            }//case minlen 
        case "alnum": 
        case "alphanumeric": 
           { 
				ret = TestInputType(objValue,"[^A-Za-z0-9]",strError, 
						objValue.name+": Only alpha-numeric characters allowed ");
				break; 
           }
        case "alnum_s": 
        case "alphanumeric_space": 
           { 
				ret = TestInputType(objValue,"[^A-Za-z0-9\\s]",strError, 
						objValue.name+": Only alpha-numeric characters and space allowed ");
				break; 
           }		   
        case "num": 
        case "numeric": 
           { 
                ret = TestInputType(objValue,"[^0-9]",strError, 
						objValue.name+": Only digits allowed ");
                break;               
           }
        case "dec": 
        case "decimal": 
           { 
                ret = TestInputType(objValue,"[^0-9\.]",strError, 
						objValue.name+": Only numbers allowed ");
                break;               
           }
        case "alphabetic": 
        case "alpha": 
           { 
                ret = TestInputType(objValue,"[^A-Za-z]",strError, 
						objValue.name+": Only alphabetic characters allowed ");
                break; 
           }
        case "alphabetic_space": 
        case "alpha_s": 
           { 
                ret = TestInputType(objValue,"[^A-Za-z\\s]",strError, 
						objValue.name+": Only alphabetic characters and space allowed ");
                break; 
           }
        case "email": 
          { 
			   ret = TestEmail(objValue,strError);
               break; 
          }
        case "lt": 
		        case "lessthan": 
         { 
    	      ret = TestLessThan(objValue,cmdvalue,strError);
              break; 
         }
        case "gt": 
        case "greaterthan": 
         { 
			ret = TestGreaterThan(objValue,cmdvalue,strError);
            break; 
         }//case greaterthan 
        case "regexp": 
         { 
			ret = TestRegExp(objValue,cmdvalue,strError);
           break; 
         }
        case "dontselect": 
         { 
			 ret = TestDontSelect(objValue,cmdvalue,strError)
             break; 
         }
		case "dontselectchk":
		{
			ret = TestDontSelectChk(objValue,cmdvalue,strError)
			break;
		}
		case "shouldselchk":
		{
			ret = TestShouldSelectChk(objValue,cmdvalue,strError)
			break;
		}
		case "selone_radio":
		case "radio":
		{
			ret = TestSelectOneRadio(objValue,strError);
		    break;
		}		
		case "alphabetic_space_decimal": 
        case "alpha_s_d": 
           { 
                ret = TestInputType(objValue,"[^A-Za-z\.\\s]",strError, 
						objValue.name+": Only alphabetic characters  and decimal and space allowed");
                break; 
           }

     
	  
	   
	   
   
        case "a_n_s_d_h": 
           { 
                ret = TestInputType(objValue,"[^A-Za-z0-9-_\/\.\\s]",strError, 
						objValue.name+": Only alphabetic characters  and decimal and space allowed");
                break; 
           }
 case "a_n_s_d_h_br": 
           { 
                ret = TestInputType(objValue,"[^A-Za-z0-9{}()-_\/\.\\s]",strError, 
						objValue.name+": Only alphabetic characters  and decimal and braces and space allowed");
                break; 
           }
		   case "alphabetic_space_decimal_brace": 
        case "alpha_s_d_br": 
           { 
                ret = TestInputType(objValue,"[^A-Za-z{}()\.\\s]",strError, 
						objValue.name+": Only alphabetic characters  and decimal and space and () and {} allowed");
                break; 
           }
		   case "date": 
           { 

                ret = TestDate(objValue,strError, objValue.name+": dd/mm/yyyy Format(year must be in 1900 to 2099)  allowed ");
			    break; 
           }
            case "date_greater_than":
             {
                        ret = TestDateGreaterThan(objValue,strError);
                    break;
             }      
		   case "time": 
           { 
                ret = TestTIME(objValue,strError, objValue.name+": Time FORMAT like HH:MM AM(am)/PM(pm) allowed");
                break; 
           }	
    }//switch 
	return ret;
}
function VWZ_IsListItemSelected(listname,value)
{//alert(49)
 for(var i=0;i < listname.options.length;i++)
 {
  if(listname.options[i].selected == true &&
   listname.options[i].value == value) 
   {
     return true;
   }
 }
 return false;
}
function VWZ_IsChecked(objcheck,value)
{//alert(50)
 if(objcheck.length)
 {
     for(var c=0;c < objcheck.length;c++)
     {
       if(objcheck[c].checked == "1" && 
	     objcheck[c].value == value)
       {
        return true; 
       }
     }
 }
 else
 {
  if(objcheck.checked == "1" )
   {
    return true; 
   }    
 }
 return false;
}
/*
	Copyright (C) 2003-2009 JavaScript-Coder.com . All rights reserved.
*/