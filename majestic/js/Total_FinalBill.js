/////////////////////////////////ROOM RENT()/////////////////////////////////////////////////////
function roomRencalc()
{//alert(1)
var patno=document.myform.patno.value;
if(patno=='')
	{alert("Please Select Patient No");return false}
else
window.open('patient_roomrent_popup.php?patno='+patno,'mypatwindow','width=800,height=300,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')
}//roomRencalc()
/////////////////////////////////END ROOM RENT()/////////////////////////////////////////////////////
//////////////////////////////TOTAL()///////////////////////////////////////////
function total(){
//var patno=document.myform.patno.value;
//if(patno=='')
//	{alert("Please Select Patient No 2");
//document.myform.patno.focus();
//return false;
//	}
//	else
//		{
	
	var sum=0;

	var admfee=document.myform.admfee.value
		var rent=document.myform.txtrent.value
		var confee=document.myform.confee.value
		var diet=document.myform.diet.value
		var lab=document.myform.lab.value
		var mr=document.myform.mr.value
		
		var txtcritical=document.myform.txtcritical.value
		var carm=document.myform.carm.value
		var oper=document.myform.oper.value
		var txtinst=document.myform.txtinst.value
		var txtAT=document.myform.txtAT.value
		var txtsurg=document.myform.txtsurg.value
		var txtsurg_as=document.myform.txtsurg_as.value
		var txtanaestist=document.myform.txtanaestist.value
		var dress=document.myform.dress.value
		var rad=document.myform.rad.value
		var grbs=document.myform.grbs.value
		var nursechar=document.myform.nursechar.value
		var dmo=document.myform.dmo.value
		var icu=document.myform.icu.value
		var dietconcharge=document.myform.dietconcharge.value
		if(diet==""){diet=0;}//alert(rent)
       if(rent==""){rent=0;}//alert(rent)
       if(confee==""){confee=0;}//alert(confee)
  
       if(admfee==""){admfee=0;}//alert(admfee)
       if(lab==""){lab=0;}//alert(lab)
       if(txtcritical==""){txtcritical=0;}//alert(txtcritical)
       if(carm==""){carm=0;}//alert(carm)
       if(oper==""){oper=0;}//alert(oper)
       if(txtinst==""){txtinst=0;}//alert(txtinst)
       if(txtAT==""){txtAT=0;}//alert(txtAT)
       if(txtsurg==""){txtsurg=0;}//alert(txtsurg)
       if(txtsurg_as==""){txtsurg_as=0;}//alert(txtsurg_as)
       if(txtanaestist==""){txtanaestist=0;}//alert(txtanaestist)
       if(dress==""){dress=0;}//alert(dress)
	     if(mr==""){mr=0;}//alert(dress)
 if(icu==""){icu=0;}if(dietconcharge==""){dietconcharge=0;}
		var flag=document.myform.flag.value
	
		var outconfee=0;
		if(flag!=0)
		{
		var outconfee=document.myform.out_tot.value
		}//if*/
       
		var eq_flag=document.myform.eq_flag.value
			
		var eq_tot=0;
		var eq_conce=0;
		if(eq_flag!=0)
		{
		eq_tot=document.myform.eq_tot.value
		eq_conce=document.myform.eq_conce.value
		}

		var at_flag=document.myform.at_flag.value
		var at_tot=0;
		if(at_flag!=0)
		{
		var at_tot=document.myform.at_tot.value
		}
		//alert(outconfee)
		 
		 /*Miscellaneous-------------------*/
		 
		 var iii=document.getElementById("rows").value;

		 //alert(eq_tot)
		 //alert(at_tot)

var micamt1=0;
if(!(iii==0)){
	  for(r=0;r!=iii;r++){
     var rows=r+1;
	//alert("rows-->"+rows)  
var micamt=0;
micamt=eval('document.myform.'+'micamt'+rows+'.value');
 if(micamt==""){micamt=0;}//alert(admfee)
micamt1=eval(micamt1)+eval(micamt);
	}//for
sum=eval(rent)+eval(confee)+eval(admfee)+eval(lab)+eval(txtcritical)+eval(carm)+eval(oper)+eval(txtinst)+eval(txtAT)+eval(txtsurg)+eval(txtsurg_as)+eval(txtanaestist)+eval(dress)+eval(micamt1)+eval(outconfee)+eval(eq_tot)+eval(at_tot)+eval(mr)+eval(diet)+eval(rad)+eval(grbs)+eval(nursechar)+eval(dmo)+eval(icu)+eval(dietconcharge);
//alert("sum-if for-->"+eval(sum));
}//if(iii)

//////////////////////Doubt about outcons_fee and  consultation charges///////////////
else{
sum=eval(rent)+eval(confee)+eval(admfee)+eval(lab)+eval(txtcritical)+eval(carm)+eval(oper)+eval(txtinst)+eval(txtAT)+eval(txtsurg)+eval(txtsurg_as)+eval(txtanaestist)+eval(dress)+eval(outconfee)+eval(eq_tot)+eval(at_tot)+eval(mr)+eval(diet)+eval(rad)+eval(grbs)+eval(nursechar)+eval(dmo)+eval(icu)+eval(dietconcharge);

//alert("sum-- else->"+eval(sum));
}

		 /*Miscellaneous-------------------*/
/////////////concessions///////////////////////////////////////////
		var admitcons=document.myform.admitcons.value
		var invg_cons=document.myform.invg_cons.value
		var opercons=document.myform.opercons.value
		var an_cons=document.myform.an_cons.value
		
		

       if(admitcons==""){admitcons=0;}
       if(invg_cons==""){invg_cons=0;}
       if(opercons==""){opercons=0;}
       if(an_cons==""){an_cons=0;}
       if(eq_conce==""){eq_conce=0;}

	    var conce=0;
	    conce=eval(admitcons)+eval(invg_cons)+eval(opercons)+eval(an_cons)+eval(eq_conce);




//alert("concessions-------->"+eval(conce));

/////////////END concessions///////////////////////////////////////
var total=0;
total=sum;

var net=0;
var txtadv=document.myform.txtadv.value;

 if(txtadv==""){txtadv=0;}

net=eval(total)-(eval(conce)+eval(txtadv));
/*var retu_bal=(eval(conce)+eval(txtadv));
//alert("retu_bal--"+retu_bal)
//alert("net--"+net)
//alert("total--"+total)
if(eval(retu_bal)>eval(total)){
	document.getElementById("netval").innerHTML="Return Amount(Rs.)";
	}
	else{
	document.getElementById("netval").innerHTML="Net Amount(Rs.)";
	}

    //alert("total-->"+eval(total));

/////////arigya conce caclution///////
var arogya=document.myform.arogya.value
	//alert("arogya--"+arogya)
	if(arogya!=0){
var arogyaper=(total*arogya)/100
document.myform.arogya1.value =eval(arogyaper).toFixed(2);

var returnval1=eval(txtadv)+eval(arogyaper);
net=eval(total)-eval(returnval1);

if(eval(returnval1)>eval(total)){
document.getElementById("netval").innerHTML="Return Amount(Rs.)";
	
}
else{
document.getElementById("netval").innerHTML="Net Amount(Rs.)";


}
	//net=0;
}//ifarofggya
*/
		document.myform.txtTot.value =eval(total).toFixed(2);

var screen=document.myform.screen.value
	if(screen=='add'){
		document.myform.txtconces.value =eval(conce).toFixed(2);
}
		//document.myform.txtnet.value =Math.abs(net).toFixed(2);


//document.myform.action="Final Bill_Insert.jsp"
	//document.myform.submit()
	//}//top else
		
				nettotal();
}//totamt()




function nettotal(){

var txtadv=document.myform.txtadv.value;
var total=document.myform.txtTot.value;
var conce=document.myform.txtconces.value;


 if(txtadv==""){txtadv=0;}

net=eval(total)-(eval(conce)+eval(txtadv));

//alert("net--"+net)
var retu_bal=(eval(conce)+eval(txtadv));
//alert("retu_bal--"+retu_bal)
//alert("net--"+net)
//alert("total--"+total)
if(eval(retu_bal)>eval(total)){
	document.getElementById("netval").innerHTML="Return Amount(Rs.)";
	}
	else{
	document.getElementById("netval").innerHTML="Net Amount(Rs.)";
	}

    //alert("total-->"+eval(total));

/////////arigya conce caclution///////
var arogya=document.myform.arogya.value
	//alert("arogya--"+arogya)
	if(arogya!=0){
var arogyaper=(total*arogya)/100
document.myform.arogya1.value =eval(arogyaper).toFixed(2);

var returnval1=eval(txtadv)+eval(arogyaper)+eval(conce);
net=eval(total)-eval(returnval1);

if(eval(returnval1)>eval(total)){
document.getElementById("netval").innerHTML="Return Amount(Rs.)";
	
}
else{
document.getElementById("netval").innerHTML="Net Amount(Rs.)";


}
	//net=0;
}//ifarofggya



/*if(net<0)
	alert("Net Amount Less Than Zero")*/


//alert("net--"+net)
document.myform.txtnet.value=Math.abs(net).toFixed(2);


}//nettotal




