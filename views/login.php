<!--
==========================================

Author      : Muhammad Surya Ihsanuddin
Email       : mutofiyah@gmail.com
Kaskus ID   : 4d3nk3j4w3n,AdenKejawen
Blog        : http://belajarcoding.com

Kode ditulis dengan Netbeans versi 7.0.1 dengan system operasi Linux Ubuntu versi 11.10 Oneiric

==========================================
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Program Penjadwalan Kuliah Otomatis | Administration Page</title>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css"/>
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/logo.png"/>
        <script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" language="javascript">
            jQuery(document).ready(function(){
                jQuery("#aden-form").submit(function(e){
                    e.preventDefault();
                    login();
                });
                jQuery("#username").focus();
                //Key Enter Handling
                jQuery("#username").keypress(function(e){
                    var key = null;
                    key = (e.keyCode ? e.keyCode : e.which);
                    if(key == 13 && jQuery.trim(jQuery("#username").val()) != ''){
                        jQuery("#password").focus();
                    }
                });
                jQuery("#password").keypress(function(e){
                    var key = null;
                    key = (e.keyCode ? e.keyCode : e.which);
                    if(key == 13){
                        login();
                    }
                });
            });
            function login(){
                var username = jQuery("#username").val();
                var password = jQuery("#password").val();
                if(username!=""&&password!=""){
                    jQuery.ajax({
                        url     : '<?php echo site_url('home/proses');?>',
                        data    : { username : username, password : password },
                        dataType: 'json',
                        type    : 'POST',
                        success : function(data){
                            if(data.status!="error"){
                                window.location = data.redirect;
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else{
                    jQuery("#username").addClass("required");
                    jQuery("#password").addClass("required");
                }
            }
        </script>
    </head>
    <body>
        <div id="login">
            <div id="header">
                <span class="header">Program Penjadwalan Kuliah Berbasis SMS Gateway</span>
            </div>
            <form action="<?php site_url('home/proses');?>" method="POST" id="aden-form">
            <div id="login-form">
                <div id="logo-aden">
                    <img src="<?php echo base_url()?>assets/img/admin.png" class="login-logo"/>
                </div>
                <div id="kotakan">
                    <div class="kiri">
                        Username
                    </div>
                    <div class="separator">
                        :
                    </div>
                    <div class="kanan">
                        <input type="text" name="username" id="username" class="input" value=""/>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="kiri">
                        Password
                    </div>
                    <div class="separator">
                        :
                    </div>
                    <div class="kanan">
                        <input type="password" name="password" id="password" class="input" value=""/>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="kiri">
                        &nbsp;
                    </div>
                    <div class="separator">
                        &nbsp;
                    </div>
                    <div class="kanan btn">
                        <input type="submit" name="submit" id="submit" class="btn-login" value="Login"/>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>    
            </div>
        </form>
        </div>
		<div id="log">
		</div>
    </body>
</html>
