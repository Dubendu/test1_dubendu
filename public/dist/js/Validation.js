let firstnameNode;
let errNode1;
let lastnameNode;
let errNode2;
let emailNode;
let errNode3;
let contactNode;
let errNode4;
let cityNode;
let errNode5;
let imageNode;
let errNode7;
let statusNode;
let errNode8;
let formNode;

$(function(){
    firstnameNode=$("#firstname");
    errNode1=$("#err1");
    lastnameNode=$("#lastname");
    errNode2=$("#err2");
    emailNode=$("#email");
    errNode3=$("#err3");
    contactNode=$("#contact");
    errNode4=$("#err4");
    cityNode=$("#city");
    errNode5=$("#err5");
    imageNode=$('#image');
    errNode7=$("#err7");
    statusNode=$('#status');
    errNode8=$("#err8");
    formNode=$("#userForm")
    firstnameNode.blur(function(){
        validate1();
    });         
    lastnameNode.blur(function(){
        validate2();
    });
    emailNode.blur(function(){
        validate3();
    });
    contactNode.blur(function(){
        validate4();
    });
    cityNode.blur(function(){
        validate5();
    });
    imageNode.blur(function(){
        validate6();
    });
    statusNode.blur(function(){
        validate7();
    });
    formNode.submit(()=>validateForm());
});



function validate1(){
    errNode1.html(" ");
    firstnameNode.css({border:'2px green solid'});
    let name=firstnameNode.val();
    if(name===""){
        errNode1.html("<b>this field is required.</b>");
        firstnameNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validate2(){
    errNode2.html(" ");
    lastnameNode.css({border:'2px green solid'});
    let name=lastnameNode.val();
    if(name===""){
        errNode2.html("<b>this field is required.</b>");
        lastnameNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validate3(){
    errNode3.html("");
    emailNode.css({border:'2px green solid'});
    let email=emailNode.val();
    let ss=email.substring(email.indexOf('@')+1);
    if(email===""){
        errNode3.html("<b>this field is required.</b>");
        emailNode.css({border:'2px red solid'});
        return false;
    }
    else if(!email.includes("@") || ss==""){
        errNode3.html("<b>Invalid email ID</b>");
        emailNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validate4(){
    errNode4.html("");
    contactNode.css({border:'2px green solid'});
    let contact=contactNode.val();
    let regexpress=/^[\d\(\)\-+]+$/;
    if(contact===""){
        errNode4.html("<b>this field is required.</b>");
        contactNode.css({border:'2px red solid'});
        return false;
    }
    else if(!regexpress.test(contact)){
        errNode4.html("<b>Invalid Mobile No.</b>");
        contactNode.css({border:'2px solid red'});
        return false;
    }
    else if(contact.length>14){
        errNode4.html("<b>contact length should be less than 14.</b>");
        contactNode.css({border:'2px red solid'});
    }
    else
        return true;

}


function validate5(){
    errNode5.html("");
    cityNode.css({border:'2px green solid'});
    let city=cityNode.val();
    if(city===""){
        errNode5.html("<b>this field is required</b>");
        cityNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function radio_check() {

    var x = $("input[type = 'radio']:checked");
    if (!x.length > 0) {
      $('#gender').show();
      $('#err6').html('<b>gender is required</b>');
      return false;
    }
    else {
      $('#gender').hide();
      return true;
    }
  }

  function validate6(){
    errNode7.html("");
    imageNode.css({border:'2px green solid'});
    let image=imageNode.val();
    var file_size = $('#image')[0].files[0].size;
    let regexpress=/\.(jpe?g|png)$/i;
    if(image===""){
        errNode7.html("<b>this field is required.</b>");
        imageNode.css({border:'2px red solid'});
        return false;
    }
    else if(!regexpress.test(image)){
        errNode7.html("<b>Only jpg and png format are allowed.</b>");
        imageNode.css({border:'2px red solid'});
        return false;
    }
    else if(file_size>1000000){
        errNode7.html("<b>Image size should be less than 1MB</b>");
		imageNode.css({border:'2px red solid'});
		return false;
    }
    else
        return true;

  }


function validate7(){
    errNode8.html("");
    statusNode.css({border:'2px green solid'});
    let status=statusNode.val();
    if(status===""){
        errNode8.html("<b>this field is required</b>");
        statusNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateForm(){
    let st1=validate1();
    let st2=validate2();
    let st3=validate3();
    let st4=validate4();
    let st5=validate5();
    let st6=radio_check();
    let st7=validate6();
    let st8=validate7();
    return(st1 && st2 && st3 && st4 && st5 && st6 && st7 && st8);
}
