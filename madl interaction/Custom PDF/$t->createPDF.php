$options = array(
        'author' => 'Testing',
        'header' => 'Header',
        'description' => 'Description',
        'footer' => 'Footer',
        'header_image' => '',
        'style' => ' th {
                        background-color: #C2CAD1;
                        color: #000000;
                        font-weight: bold;
                    }
                    .odd {
                        background-color: #C1E5FF;
                        color: #000000;
                    }
                    .even {
                        background-color: #E8E8E8;
                        color: #000000;
                    }
                    .heading{
                        background-color: #336699;
                        color: #FFFFFF;
                    }
                    .required {
                        color: #cc0000;
                        font-weight: bold;
                        font-size: 30px;
                    }',
        'include_fields' => array(), //exclude_fields have higher precedence than include_fields
        'exclude_fields' => array(
                        'Field1',
                        'SubformField2' => array(
                                'SField1', 
                                'SSubField2' => array(
                                        'SSField1'
                                        )
                                )
                    ),
        'base64_encode' => false
    );

//function call
//the argument is optional
$pdf_content = $t->createPDF($options);

$from ="bmp@blinkmobile.com.au";
$to = "you@youremail.com.au";
$subject = "After";
$body = "see attachments";

$t->AddStringAttachment($pdf_content, "MyCustomPdf.pdf", "base64", "application/pdf");
$t->email($to, $subject, $body, $from);
