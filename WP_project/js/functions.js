function showHideSections(showelemid , hideelemid)
{
	document.getElementById(showelemid).style.display = "block";
	document.getElementById(hideelemid).style.display = "none";
}
function showSection(showelemid)
{
	document.getElementById(showelemid).style.display = "block";
}
function hideSection(hideelemid)
{
	document.getElementById(hideelemid).style.display = "none";
}

function showmsg()
{
alert(document.getElementById("bgDesign").innerHTML);
}
function ChangeLabel1(obj) {
	document.getElementById("label1").style.font="60px italic Gabriola, Arial";
	var ob = obj.value;			
	label1.innerHTML = ob;
} 
function ChangeLabel2(obj) {
	document.getElementById("label2").style.font="italic bold 13px arial,serif";
	var ob = obj.value;			
	label2.innerHTML = ob;
	}
function ChangeLabel3(obj) {
	document.getElementById("label3").style.font="italic bold 13px arial,serif";
	var ob = obj.value;			
	label3.innerHTML = ob;
}
function ChangeLabel4(obj) {
	document.getElementById("label4").style.font="italic bold 13px arial,serif";
	var ob = obj.value;			
	label4.innerHTML = ob;
}
function ChangeLabel5(obj) {
	document.getElementById("label5").style.font="italic bold 13px arial,serif";
	var ob = obj.value;			
	label5.innerHTML = ob;				
}
function ChangeLabel6(obj) {
	document.getElementById("label6").style.font="italic bold 13px arial,serif";
	var ob = obj.value;			
	label5.innerHTML = ob;				
}

function ChangeColor()
{
	var x = document.getElementById("myColor").value;
	document.getElementById("label1").style.color= x;
	document.getElementById("label2").style.color= x;
	document.getElementById("label3").style.color= x;
	document.getElementById("label4").style.color= x;
	document.getElementById("label5").style.color= x;
	document.getElementById("label6").style.color= x;
	
}
function enableTxts(tid)
{
	document.getElementById("name"+tid).disabled = false;
	document.getElementById("elnkdiv"+tid).innerHTML = '<form action="todo.php?edit=1&eid=1&tid='+tid+'" method="post"><input type="submit" value="Save" /></form>';
	//document.getElementById("elnk"+tid).onclick = "alert(1)";
}
function changeLabels(txtname, txtid)
{
	alert(txtname);
	
	document.getElementById("u_first_name"+txtid).disabled =true;
	document.getElementById("u_first_name"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById("u_last_name"+txtid).disabled = true;
	document.getElementById("u_last_name"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById("u_street"+txtid).disabled = true;
	document.getElementById("u_street"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById("u_city"+txtid).disabled = true;
	document.getElementById("u_city"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById("u_state"+txtid).disabled = true;
	document.getElementById("u_state"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById("u_zip"+txtid).disabled = true;
	document.getElementById("u_zip"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById("u_contact"+txtid).disabled = true;
	document.getElementById("u_contact"+txtid).style.backgroundColor = "#e9dfc6";
	document.getElementById(txtname).disabled = false;
	document.getElementById(txtname).style.backgroundColor = "#FFFFFF";
	document.getElementById("edit"+txtid).style.display = "none";
	document.getElementById("save"+txtid).style.display = "block";
}
