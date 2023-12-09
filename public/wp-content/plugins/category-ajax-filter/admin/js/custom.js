/* --------------------- GET STATES FROM COUNTRY ID ------------------------ */	
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
jQuery(function($){
 
 if(getCookie("hashcaf")!='') {
  url=getCookie("hashcaf");
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  var get_text=$.trim($(".tab-content "+url+" .manage-top-dash.text").text());
  $(".manage-top-dash.general-tab.new-tab span.text").text(get_text);
  console.log(get_text);
} 
 
 if(getCookie("hashcafsub")!='') {
  url=getCookie("hashcafsub");
  //console.log(url);
    var ht=$(".tab-header[data-content='"+url+"']").toggleClass('active');
  var dataDiv=".tab-content."+url;
 var hdrdiv=".tab-header[data-content='"+url+"']";
$(dataDiv).addClass('active');	
$(hdrdiv).find("i.fa-angle-down").removeClass("rotate2").addClass('rotate');
 
} 

 $("#myTab a").click(function(){
 var hashurl=$(this).attr('href');
setCookie("hashcaf",hashurl,30);
  var get_text=$.trim($(".tab-content "+hashurl+" .manage-top-dash.text").text());
  $(".manage-top-dash.general-tab.new-tab span.text").text(get_text);
})
//console.log("I am working!!");

/*---- Start Function For Tab Click ----*/	

$("#app-tab a").click(function(e){

e.preventDefault();

var href=$(this).attr("href");
//console.log(href);
$("#app-tab a").each(function(){

$(this).removeClass('active');	

});

$("#app-tab-content .app-tab-content").each(function(){

$(this).removeClass('active');	

});

	

$(this).addClass('active');	

$("#app-tab-content").find(href).addClass('active');

});

/*---- END Function For Tab Click ----*/		



/*---- Start Function For CUSTOM POST TYPE SELECT ----*/
$("#caf_top_meta_box #custom-post-type-select").change(function(){

var val=$(this).val();
//console.log(val);
$.ajax({

            url : tc_caf_ajax.ajax_url,

            type : 'post',

	        dataType : "json",

            data : {action: "tc_caf_get_taxonomy",nonce_ajax : tc_caf_ajax.nonce,cpt:val},

            success : function( response ) {

            //console.log(response);

				var div="#caf_top_meta_box #caf-taxonomy,#caf_top_meta_box ul.category-lists";

				$(div).html('');

				for(i=0;i<response['tax'].length;i++)

					{	

					$("#caf_top_meta_box #caf-taxonomy").append("<option value='"+response['tax'][i]+"'>"+response['tax'][i]+"</option>");

					}

				//var terms=JSON.parse(response);

				//console.log(response['terms']);

				if(response['terms'].length>0) {

					$("#caf_top_meta_box ul.category-lists").append("<li id='all-cat'><input name='all-select' class='category-list-all check' id='category-all-btn' type='checkbox' onClick='selectAllCats()'><label for='category-all-btn' class='category-list-all-label'>All</label></li>");

				for(i=0;i<response['terms'].length;i++)

					{

					var tid=response['terms'][i]['term_id'];

					var tname=response['terms'][i]['name'];	

					//console.log(tid);

					$("#caf_top_meta_box ul.category-lists").append('<li><input name="category-list[]" class="category-list check" id="category-list-id'+tid+'" type="checkbox" value="'+response['terms'][i]['term_id']+'"><label for="category-list-id'+tid+'" class="category-list-label">'+response['terms'][i]['name']+'</label></li>');

					}

				}

				else if(response['terms'].length=='0') {

					$("#caf_top_meta_box ul.category-lists").append('<div class="notice-error">No Category added for this custom post type/taxonomy.</div>');

				}

				else {

				$("#caf_top_meta_box ul.category-lists").append('<div class="notice-error">Error Occured..</div>');

				}
            }

        });	

});
/*---- End Function For CUSTOM POST TYPE SELECT ----*/
	/*---- Start Function To Get Terms Of Taxonomy ----*/
$("#caf_top_meta_box #caf-taxonomy").change(function(){
var val=$(this).val();
$.ajax({
            url : tc_caf_ajax.ajax_url,

            type : 'post',

	        dataType : "json",

            data : {action: "tc_caf_get_terms",nonce_ajax : tc_caf_ajax.nonce,taxonomy:val},

            success : function( response ) {

            //console.log(response['terms']);

				var div="#caf_top_meta_box ul.category-lists";

				$(div).html('');

				if(response['terms'].length>0) {

					$(div).append("<li id='all-cat'><input name='all-select' class='category-list-all check' id='category-all-btn' type='checkbox' onClick='selectAllCats()'><label for='category-all-btn' class='category-list-all-label'>All</label></li>");

				for(i=0;i<response['terms'].length;i++)

					{

					var tid=response['terms'][i]['term_id'];

					var tname=response['terms'][i]['name'];

					$(div).append('<li><input name="category-list[]" class="category-list check" id="category-list-id'+tid+'" type="checkbox" value="'+tid+'"><label for="category-list-id'+tid+'" class="category-list-label">'+tname+'</label></li>');

					}
				}
				else if(response['terms'].length=='0') {
					$(div).append('<div class="notice-error">No Category added for this custom post type/taxonomy.</div>');	
				}
				else {
				$(div).append('<div class="notice-error">Error Occured.</div>');	
				}
            }
        });	
});

/*---- End Function For CUSTOM POST TYPE SELECT ----*/
/*---- START Function To Change layout design preview ----*/
$(".filter-reset").click(function(e){
e.preventDefault();
var layout=$("#caf-filter-layout").val();
var btn1=".filter-color-combo .filter-primary-color button";
var field_value1=".filter-color-combo .filter-primary-color .my-color-field";
var btn2=".filter-color-combo .filter-sec-color button";
var field_value2=".filter-color-combo .filter-sec-color .my-color-field";
var btn3=".filter-color-combo .filter-sec-color2 button";
var field_value3=".filter-color-combo .filter-sec-color2 .my-color-field";
if(layout=='filter-layout1') {
$(btn1).css({"background-color":"#ff8ca2"});
$(field_value1).val("#ff8ca2");
$(btn2).css({"background-color":"#ffffff"});
$(field_value2).val("#ffffff");
$(btn3).css({"background-color":"#262626"});
$(field_value3).val("#262626");
}
if(layout=='filter-layout2') {
$(btn1).css({"background-color":"#262626"});
$(field_value1).val("#262626");
$(btn2).css({"background-color":"#848484"});
$(field_value2).val("#848484");
$(btn3).css({"background-color":"#ffffff"});
$(field_value3).val("#ffffff");
}
if(layout=='filter-layout3') {
$(btn1).css({"background-color":"#262626"});
$(field_value1).val("#262626");
$(btn2).css({"background-color":"#ffffff"});
$(field_value2).val("#ffffff");
$(btn3).css({"background-color":"#ffffff"});
$(field_value3).val("#ffffff");
}
});
$(".post-reset").click(function(e){
e.preventDefault();
var layout=$("#caf-post-layout").val();
var btn1=".post-color-combo .post-primary-color button";
var field_value1=".post-color-combo .post-primary-color .my-color-field";
var btn2=".post-color-combo .post-sec-color button";
var field_value2=".post-color-combo .post-sec-color .my-color-field";
var btn3=".post-color-combo .post-sec-color2 button";
var field_value3=".post-color-combo .post-sec-color2 .my-color-field";
if(layout=='post-layout3') {
$(btn1).css({"background-color":"#ff8ca2"});
$(field_value1).val("#ff8ca2");
$(btn2).css({"background-color":"#ffffff"});
$(field_value2).val("#ffffff");
$(btn3).css({"background-color":"#2d2d2d"});
$(field_value3).val("#2d2d2d");
}
});
/*---- END Function To Change layout design preview ----*/
/*---- START Function To check value of switcher Managae Filter ----*/	
	$('.checkstate').change(function() {
		var val=$(this).prop('checked');
		var dn="#"+$(this).attr("data-name");
		//console.log(fields);
		if(val==true) {
			$(dn).val('on');
		$(".manage-filters").removeClass('caf-hide');
		} 
		else {
			$(dn).val('off');
			$(".manage-filters").addClass('caf-hide');
		}
		var obj=get_obj_data();
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
    });
	/*---- END Function To check value of switcher ----*/
	/*---- START Function To check value of switcher Meta Filter ----*/	
	$('.checkstateofmeta').change(function() {
		var val=$(this).prop('checked');
		//console.log(val);
		if(val==true) { $(this).val('1'); 
		//$(".meta-fields-row").fadeIn();
					  } 
		else {
			$(this).val('0');
		//$(".meta-fields-row").fadeOut();
		}
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
    });
	/*---- END Function To check value of switcher Meta Filter ----*/
	/*---- START Function To check value of switcher Meta Filter ----*/	
	$('.checkstateofpgn').change(function() {
		var val=$(this).prop('checked');
		//console.log(val);
		if(val==true) { $(this).val('1'); 
		$(".p-type").fadeIn();
					  } 
		else {
			$(this).val('0');
			$(".p-type").fadeOut();
		}
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
    });
	/*---- END Function To check value of switcher Meta Filter ----*/
	/*---- START Function To LOAD Wp COLOR ----*/
	$('.my-color-field').wpColorPicker();
	/*---- END Function To LOAD Wp COLOR ----*/
	var total_check=jQuery("#caf_top_meta_box .category-lists .category-list.check").length;
    var checked_check=jQuery("#caf_top_meta_box .category-lists .category-list.check:checked").length;
	if(total_check==checked_check) {
		jQuery("#caf_top_meta_box .category-lists .category-list-all").attr("checked","checked");}
});
/*---- START Function To SELECT ALL CATEGORIES ----*/
function selectAllCats(e) {
var total_check=jQuery("#caf_top_meta_box .category-lists .category-list.check").length;
var checked_check=jQuery("#caf_top_meta_box .category-lists .category-list.check:checked").length;
//console.log(total_check,checked_check,checked_check2);
jQuery("#caf_top_meta_box .category-lists .category-list.check").each(function(i){
var check=jQuery(this).attr("checked");
if(total_check==checked_check) { jQuery(this).removeAttr("checked");} 
else {jQuery(this).attr("checked","checked");}
})
}
/*---- End Function To SELECT ALL CATEGORIES ----*/
jQuery(function($){
var div="#tabs-panel .tab-panel .tab-header";
var divs="#tabs-panel .tab-panel .tab-content";	
$(div).click(function(){
 var hashcafsub=$(this).attr("data-content");
 setCookie("hashcafsub",hashcafsub,30);
$(this).toggleClass('active');	
var dataDiv="."+$(this).attr("data-content");
//console.log(dataDiv);
if($(dataDiv).hasClass('active')) {
//console.log('exist');
$(dataDiv).removeClass('active');
$(this).find("i.fa-angle-down").removeClass('rotate').addClass('rotate2');
}
else{
//console.log('not');
$(dataDiv).addClass('active');	
$(this).find("i.fa-angle-down").removeClass("rotate2").addClass('rotate');
}	
});	
});
jQuery(function($){
$("#caf-post-layout").change(function(){
var playout=$(this).val();
conditional_fields_for_post_layout(playout);
});
var playout=$("#caf-post-layout").val();
conditional_fields_for_post_layout(playout);	
get_obj_data();
});
function conditional_fields_for_post_layout(playout) {
if(playout=='post-layout4') {
jQuery(".clm-layout").fadeOut();
}
else {
jQuery(".clm-layout").fadeIn();	
}
}
var fields = {};
function get_obj_data(){
jQuery("#caf_top_meta_box").find(".tc_caf_object_field").each(function() {
fields[this.name] = jQuery(this).val();
});
var obj = {fields: fields};	
//console.log(obj);
}
jQuery(function($){
$("#import-layout-button").click(function(e){
e.preventDefault();
var json=$("#import-caf-layout").val();	
var obj = JSON.parse(json);
$.each(obj, function(key,value){
$(".caf_import[data-import='"+key+"']").val(value);	
});	
$('#publish').click();	
})	
})
