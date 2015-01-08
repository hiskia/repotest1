<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.:: Program Penjadwalan Kuliah Kelas Karyawan FTUMJ ::.</title>
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/logo.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/extjs/css/ext-all.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
        <script type="text/javascript" src="<?php echo base_url('assets/extjs/ext-all-debug.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/main.js');?>"></script>
        <!--[if gte IE 9]>
        <style type="text/css">
            #appHeader {
                filter: none;
            }
        </style>
        <![endif]-->
        <script type="text/javascript">
            Ext.BLANK_IMAGE_URL = '<?php echo base_url('assets/img/s.gif');?>';
            var BASE_URL        = '<?php echo site_url();?>';
            var USERNAME        = '<?php echo (!$this->session->userdata('p3nj4dw4l4n_L0993d')) ? 'Unspecific User Level' : $this->session->userdata('level');?>';
            var HOME_PAGE       = 'http://belajarcoding.com';
            
            window.setTimeout("jamDigital()",1000);
            
            function jamDigital(){
                var tanggal = new Date();  
                setTimeout("jamDigital()",1000);
                //Jam
                var jam     = tanggal.getHours().toString();
                if(jam.length==1){
                    jam     = '0' + jam;
                }
                var menit   = tanggal.getMinutes().toString();
                if(menit.length==1){
                    menit   = '0' + menit;
                }
                var detik   = tanggal.getSeconds().toString();
                if(detik.length==1){
                    detik   = '0' + detik;
                }
                Ext.getCmp("timeStatus").update(jam + ":" + menit + ":" + detik);
                Ext.getCmp("dateStatus").update('<?php echo date('d-m-Y');?>');
            }
        </script>
    </head>
    <body>
    </body>
</html>
