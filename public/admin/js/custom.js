// create slug from a input field in jquery

$(document).ready(function(){
    $("#input_title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();

        Text = Text.replace(/\?/g, '');
        
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);
    });
});