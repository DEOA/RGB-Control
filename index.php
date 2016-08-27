<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>RGB-Control</title>


<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link rel="apple-touch-icon-precomposed" href="icon.png" />


<script type="text/javascript">
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
</script>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="farbtastic.js"></script>
<link rel="stylesheet" href="farbtastic.css" type="text/css" />
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
                  $('#demo').hide();
                  $('#picker').farbtastic('#color');
                  });
</script>


<style>

@viewport {
width: device-width;
    user-zoom:fixed;
}

.container{padding:0px 0px;margin:0px 0px;}
.bg{background:#167efb;color:#167efb;}
    
    /* Radio group */
    .segmented {
    display:flex;
        flex-flow:row wrap;
        box-sizing:border-box;
        font-family:"Helvetica Neue";
        font-size:90%;
        text-align:center;
    }
    .segmented label {
    display:block;
    flex:1;
        max-width: 80px;
        box-sizing:border-box;
    border:1px solid #167efb;
        border-right:0px;
    color:#167efb;
    margin:none;
    padding:.4em;
    cursor: pointer;
        user-select:none;
        -webkit-user-select:none;
    }
    .segmented label.checked {
    background:#167efb;
    color:#fff;
    }
    .segmented label:first-child {
        border-radius:.4em 0 0 .4em;
        border-right:0;
    }
    .segmented label:last-child {
        border-radius:0 .4em .4em 0;
        border-right:1px solid;
    }
    .segmented input[type="radio"] {
    appearance:none;
        -webkit-appearance:none;
    margin:0;
    position: absolute;
    }

body {
position: relative;
overflow:hidden;
width:100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    
    padding-top:1%;
    padding-left:5%;
    
    <!--The background image looks really bad on desktop browsers, I only use it on my iPhone so it works for me, if you know some css you should edit this section for a better look-->
    <!--The desktop.jpg is not included in this rep, choose any picture you want-->
        
    background: url(/desktop.jpg) no-repeat center center fixed;
    }
    
    @media only screen and (min-width : 320px) and (max-width : 480px) {
    background: url(/desktop.jpg) no-repeat center center fixed;
}
</style>

</head>
<body>


<div class="onoffswitch">
<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked onchange="convert(document.getElementById("color").value)">
<label class="onoffswitch-label" for="myonoffswitch">
<span class="onoffswitch-inner"></span>
<span class="onoffswitch-switch"></span>
</label>
</div>

<p>
<p>

<div id="demo" style="color: red; font-size: 1.4em">jQuery.js is not present. You must install jQuery in this folder for the demo to work.</div>

<form action="" style="width: 500px;">
<div class="form-item"><label for="color" hidden ">Color:</label><input type="text"  id="color" name="color" value="#123456" hidden  /></div><div id="picker"></div>
</form>
    
    <p>
    <p>

    <div class="container">
    <div class="segmented">
    <label id="sel1" class="checked"><input type="radio" name="segmented" checked />     TV-Back    </label>
    <label id="sel2"><input type="radio" name="segmented" />    Side   </label>
    <label id="sel3"><input type="radio" name="segmented" />   Back  </label>
    </div>
    </div>
   

<script type="text/javascript">

    $(document).ready(function(){
        $(".segmented label input[type=radio]").each(function(){
            $(this).on("change", function(){
                       if($(this).is(":checked")){
                            $(this).parent().siblings().each(function(){
                                    $(this).removeClass("checked");
                            });
                            $(this).parent().addClass("checked");
                        }
            });
        });
        });
    
    
    function HaveCSSClass(obj, cssclassname)
    {
        if (typeof obj=="string")
            obj = document.getElementById(obj);
        if (typeof obj=="undefined")
            return;
        CSSClasses = obj.className.split(" ");
        for (i=0; i<CSSClasses.length; i++)
            if (CSSClasses[i]==cssclassname)
                return true;
        return false;
    
    }
    
    
function convert(h) {
    
   var L = "1";
   var R = hexToR(h);
   var G = hexToG(h);
   var B = hexToB(h);
    
    function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
    function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
    function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
    function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}

    // Check which segment is selected (for multiple RGB-Strips)
    
    
    if (HaveCSSClass("sel1", "checked"))
    {
      L = "1";
    } else if (HaveCSSClass("sel2", "checked"))
    { L = "2";
    } else L = "3";
    
var url1 = "schalter.php?l=";
var url3 = url1+L+"&r="+R+"&g="+G+"&b="+B;
http_request = false;

    if (document.getElementById("myonoffswitch").checked ) {
    } else url3 = url1 + L +"&r=0&g=0&b=0";
    
if (Number.isInteger(R+G+B)) {

if (window.XMLHttpRequest) {
http_request = new XMLHttpRequest();
if (http_request.overrideMimeType) {
http_request.overrideMimeType('text/xml');
}
} else if (window.ActiveXObject) {
try {
http_request = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
http_request = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}
}
}
http_request.open('GET', url3, true);
http_request.send(null);

}
   }

</script>

</body>
</html>
