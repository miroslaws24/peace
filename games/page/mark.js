<script>
	var mark1 = document.getElementById("mark1");
	var mark2 = document.getElementById("mark2")
	var mark3 = document.getElementById("mark3")
	var mark4 = document.getElementById("mark4")
	var mark5 = document.getElementById("mark5")
	var mark6 = document.getElementById("mark6")
	var mark7 = document.getElementById("mark7")
	
	var mM = document.getElementById("mM")
	
	mark1.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		document.getElementById('mark_main').innerHTML = '1';
		mM.setAttribute("style","background-color: #7FCAFF;");
	}
	mark2.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		
		mM.setAttribute("style","background-color: #76C6FF;");
		document.getElementById('mark_main').innerHTML = '2';
	}
	mark3.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		
		mM.setAttribute("style","background-color: #6FC3FF");
		document.getElementById('mark_main').innerHTML = '3';
	}
	mark4.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		
		mM.setAttribute("style","background-color: #64BFFF;");
		document.getElementById('mark_main').innerHTML = '4';
	}
	mark5.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		mark5.setAttribute("style","background-color: #5CBCFF;");
		
		mM.setAttribute("style","background-color: #5CBCFF");
		document.getElementById('mark_main').innerHTML = '5';
	}
	mark6.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		mark5.setAttribute("style","background-color: #5CBCFF;");
		mark6.setAttribute("style","background-color: #4DB5FF;");
		
		mM.setAttribute("style","background-color: #4DB5FF");
		document.getElementById('mark_main').innerHTML = '6';
	}
	mark7.onmouseover = function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		mark5.setAttribute("style","background-color: #5CBCFF;");
		mark6.setAttribute("style","background-color: #4DB5FF;");
		mark7.setAttribute("style","background-color: #35ABFF;");
		
		mM.setAttribute("style","background-color: #35ABFF");
		document.getElementById('mark_main').innerHTML = '7';
	}
	
	mark7.onmouseout= function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		mark5.setAttribute("style","background-color: #5CBCFF;");
		mark6.setAttribute("style","background-color: #4DB5FF;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
	}
	mark6.onmouseout= function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		mark5.setAttribute("style","background-color: #5CBCFF;");
		mark6.setAttribute("style","background-color: #f1f1f1;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
	}
	mark5.onmouseout= function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #64BFFF;");
		mark5.setAttribute("style","background-color: #f1f1f1;");
		mark6.setAttribute("style","background-color: #f1f1f1;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
	}
	mark4.onmouseout= function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #6FC3FF;");
		mark4.setAttribute("style","background-color: #f1f1f1;");
		mark5.setAttribute("style","background-color: #f1f1f1;");
		mark6.setAttribute("style","background-color: #f1f1f1;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
	}
	mark3.onmouseout= function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #76C6FF;");
		mark3.setAttribute("style","background-color: #f1f1f1;");
		mark4.setAttribute("style","background-color: #f1f1f1;");
		mark5.setAttribute("style","background-color: #f1f1f1;");
		mark6.setAttribute("style","background-color: #f1f1f1;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
	}
	mark2.onmouseout= function(){
		mark1.setAttribute("style","background-color: #7FCAFF;");
		mark2.setAttribute("style","background-color: #f1f1f1;");
		mark3.setAttribute("style","background-color: #f1f1f1;");
		mark4.setAttribute("style","background-color: #f1f1f1;");
		mark5.setAttribute("style","background-color: #f1f1f1;");
		mark6.setAttribute("style","background-color: #f1f1f1;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
	}
	mark1.onmouseout= function(){
		mark1.setAttribute("style","background-color: #f1f1f1;");
		mark2.setAttribute("style","background-color: #f1f1f1;");
		mark3.setAttribute("style","background-color: #f1f1f1;");
		mark4.setAttribute("style","background-color: #f1f1f1;");
		mark5.setAttribute("style","background-color: #f1f1f1;");
		mark6.setAttribute("style","background-color: #f1f1f1;");
		mark7.setAttribute("style","background-color: #f1f1f1;");
		document.getElementById('mark_main').innerHTML = '0';
	}
</script>