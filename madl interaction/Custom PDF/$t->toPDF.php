$defaults = array(
        'base64' => false,
        'page' => array(
            'orientation' => 'P',
            'unit' => 'mm',
            'size' => 'A4',
            'unicode' => true,
            'encoding' => 'UTF-8',
            'margins' => array(
                't' => 27,
                'r' => 15,
                'b' => 30,
                'l' => 15
            ),
            'imageScaling' => 1.5,
            'secure' => false,
        ),
        'meta' => array(
            'creator' => '',
            'author' => '',
            'title' => '',
            'subject' => '',
            'keywords' => ''
        ),
        'security' => array(
            'permissions' => array(
                'print', 
                'modify', 
                'copy', 
                'annot-forms', 
                'fill-forms', 
                'extract', 
                'assemble', 
                'print-high'
            ),
            'userPassword' => '',
            'ownerPassword' => null,
            'mode' => 0,
            'pubKeys' => null
        ),
        'header' => array(
            'margin' => 5,
            'border' => 'B',
            'font' => array(
                'family' => 'arialuni', 
                'style' => '', 
                'size' => 10
            ),
            'html'=> '<table style="font-family:Arial, Helvetica, sans-serif;" width="100%"  border="0">
<tr>
  <td width="30%"><a href="http://www.blinkmobile.com.au"><img  width="200" src="http://s3.amazonaws.com/au.com.blinkmobile.bmp2.conference.conf-1/signature/Bmlogo.jpg" alt="www.blinkmobile.com.au" /></a></td>
  <td valign="middle"><h1 style="color: #336699; margin: 0px; padding: 0px;">BlinkMobile Interactive</h1><font style="font-weight:bold; color: #A0A0A0; margin: 0px; padding: 0px;">PDF DEMO</font>
  </td>
</tr>
</table>'
        ),
        'footer' => array(
            'margin' => 30,
            'border' => 'T',
            'font' => array(
                'family' => 'arialuni', 
                'style' => '', 
                'size' => 10
            ),
            'html'=> '<table style="font-family:Arial, Helvetica, sans-serif;" width="100%">
      <tr>
        <td rowspan="2" valign="middle" >{_BLINK_PAGE_NO_}/{_BLINK_PAGES_}</td>
        <td>
            <strong>Ashish Tilara</strong><br>
            <em>Web Developer</em><br>
            ashish@blinkmobile.com.au
        </td>
      </tr>
      <tr>
        <td>
        <img height="20" width="20" src="http://s3.amazonaws.com/au.com.blinkmobile.bmp2.conference.conf-1/signature/in.png"/> <img height="20" width="20" src="http://s3.amazonaws.com/au.com.blinkmobile.bmp2.conference.conf-1/signature/tw.png"/> <img height="20" width="20" src="http://s3.amazonaws.com/au.com.blinkmobile.bmp2.conference.conf-1/signature/yt.png"/> <img height="20" width="20" src="http://s3.amazonaws.com/au.com.blinkmobile.bmp2.conference.conf-1/signature/fb.png"/>
        </td>
      </tr>
    </table>'
        ),
        'body' => array(
            'html' => '<html>
    <head>
        <style type="text/css">

            .info {
                margin: 5px 0px;
                padding:5px 5px 5px 5px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight: bold;
                color: #00529B;
                background-color: #E6F5FC;
            }
            .success {
                margin: 5px 0px;
                padding:5px 5px 5px 5px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight: bold;
                color: #4F8A10;
                background-color: #F1FAE1;
            }
            .warning {
                margin: 5px 0px;
                padding:5px 5px 5px 5px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight: bold;
                color: #9F6000;
                background-color: #FAF4DC;
            }
            .error {
                margin: 5px 0px;
                padding:5px 5px 5px 5px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight: bold;
                color: #D8000C;
                background-color: #FFEDF2;
            }
            .processing {
                margin: 5px 0px;
                padding:5px 5px 5px 5px;
                background-repeat: no-repeat;
                background-position: 10px center;
                font-weight: bold;
                color: #73706F;
                background-color: #F2F2F2;
            }
        </style>
    </head>
<body>

<div class="error">ERROR</div>
<div class="info">INFO</div>
<div class="success">SUCCESS</div>
<div class="warning">WARNING</div>
<div class="processing">PROCESSING</div>

<br /><br /><br />
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
<em>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</em> 
<em>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</em>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
<br /> <br />
<em>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</em> 
<em>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</em>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
<em>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</em> 
<em>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</em>
<br /><br /><br />
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
<em>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</em> 
<em>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</em>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
<br /> <br />
<em>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</em> 
<em>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</em>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
<em>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</em> 
<em>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</em>
<br /><br /><br />

<div class="error">ERROR</div>
<div class="info">INFO</div>
<div class="success">SUCCESS</div>
<div class="warning">WARNING</div>
<div class="processing">PROCESSING</div>


<body>
</html>',
            'font' => array(
                'family' => 'arialuni', 
                'style' => '', 
                'size' => 10
            ),
            'align' => ''
        )
    );


$from ="bmp@blinkmobile.com.au"; $to = "you@youremail.com.au";
$subject = "After";
$body = "see attachments";
$pdf_content = $t->toPDF($defaults);

$t->AddStringAttachment($pdf_content, "MyCustomPdf.pdf", "base64", "application/pdf");
$t->email($to, $subject, $body, $from);

echo $t->result;