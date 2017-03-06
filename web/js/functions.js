$("img").hide();
//Username checking...
$("#tbUsername").keyup(function() {
    var reKorIme = /^[a-z0-9A-Z\_\!\.]{3,15}$/;
    var vrednost = $(this).val();
    if (vrednost == "") {
        $(this).parent().parent().removeClass('has-error').removeClass('has-success');
        $(this).next().removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $("#greskaUsername").html("");
    } else if (!vrednost.match(reKorIme)) {
        $("#greskaUsername").html("Between 3 and 15 characters!");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaUsername").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
});
//First name checking...
$("#tbFname").keyup(function() {
    var reIzraz = /^[A-Z\Č\Ć\Š\Đ\Ž]{1}[a-z\č\ć\š\đ\ž]{2,22}$/;
    var vrednost = $(this).val();
    var petar = $(this);
    if (vrednost == "") {
        $(this).parent().parent().removeClass('has-error').removeClass('has-success');
        $(this).next().removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $("#greskaFname").html("");
    } else if (!vrednost.match(reIzraz)) {
        $("#greskaFname").html("First letter uppercase, at least 3 letters!</br>");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaFname").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
});
//Last name checking...
$("#tbLname").keyup(function() {
    var reIzraz = /^[A-Z\Č\Ć\Š\Đ\Ž]{1}[a-z\č\ć\š\đ\ž]{2,22}$/;
    var vrednost = $(this).val();
    if (vrednost == "") {
        $(this).parent().parent().removeClass('has-error').removeClass('has-success');
        $(this).next().removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $("#greskaLname").html("");
    } else if (!vrednost.match(reIzraz)) {
        $("#greskaLname").html("First letter uppercase, at least 3 letters!");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaLname").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
});
//Password checking...
$("#tbPass").keyup(function() {
    var reIzraz = /^[a-z0-9A-Z\_\.\!\?]{3,15}$/;
    var vrednost = $(this).val();
    var pass1 = $("#tbPass1").val();
    if (vrednost == "") {
        $(this).parent().parent().removeClass('has-error').removeClass('has-success');
        $(this).next().removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $("#greskaPassword").html("");
    } else if (!vrednost.match(reIzraz)) {
        $("#greskaPassword").html("At least 3 characters!");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaPassword").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
    if (pass1 == "") {} else if (vrednost != pass1) {
        $("#greskaPassword1").html("Passwords must match!");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaPassword1").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
        $("#tbPass").parent().parent().removeClass('has-error').addClass('has-success');
        $("#tbPass").next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
        $("#greskaPassword").html("");
    }
});
//Matching passwords...
$("#tbPass1").keyup(function() {
    var pass = $("#tbPass").val();
    var vrednost = $(this).val();
    if (vrednost == "") {
        $(this).parent().parent().removeClass('has-error').removeClass('has-success');
        $(this).next().removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $("#greskaPassword1").html("");
    } else if (pass != vrednost || vrednost == "") {
        $("#greskaPassword1").html("Passwords must match!");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaPassword1").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
});
//Email checking...
$("#tbMail").keyup(function() {
    var reIzraz = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var vrednost = $(this).val();
    if (vrednost == "") {
        $(this).parent().parent().removeClass('has-error').removeClass('has-success');
        $(this).next().removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $("#greskaEmail").html("");
    } else if (!vrednost.match(reIzraz)) {
        $("#greskaEmail").html("Incorect email format!");
        $(this).parent().parent().addClass('has-error');
        $(this).next().addClass('glyphicon-remove');
    } else {
        $("#greskaEmail").html("");
        $(this).parent().parent().removeClass('has-error').addClass('has-success');
        $(this).next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
});