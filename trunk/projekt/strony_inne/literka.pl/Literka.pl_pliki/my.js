$(function() {


$('#tooltiped_fields *').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	fade: 250
});

$('#tooltiped_form *').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	fade: 250
});

$('#tooltiped_table *').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	fade: 250
});

$('#wrapPublish *').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	fade: 250
});

$(".helpInfo a").tooltip({ 
    bodyHandler: function() { 
        return $($(this).attr("href")).html(); 
    }, 
    showURL: false 
});

});

function expandForm(){
  if( document.getElementById('order_delivery_address_not_equal').checked == true ){
	$('#delivery_address_when_not_equal').stop().slideUp();
    document.getElementById('order_fv_company_name').value = '';
    document.getElementById('order_fv_street_name').value = '';
    document.getElementById('order_fv_street_number').value = '';
    document.getElementById('order_fv_local_number').value = '';
    document.getElementById('order_fv_post_code').value = '';
    document.getElementById('order_fv_city_name').value = '';
    
  } else {
    $('#delivery_address_when_not_equal').stop().slideDown();
  }

}

function switchForm(){
  if( document.getElementById('order_is_company').checked == true ){
	$('#is_company').stop().slideDown();
	document.getElementById('order_company_name').value = '';
	document.getElementById('order_nip').value = '';
  }
  else{
	$('#is_company').stop().slideUp();
  }
	
}