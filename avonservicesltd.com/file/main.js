$(document).ready(function(){var p=window.matchMedia("(min-width: 1200px)"),a=window.matchMedia("(max-width: 1199px)"),m=window.matchMedia("(max-width: 991px)"),C=window.matchMedia("(min-width: 992px)"),u=window.matchMedia("(min-width: 768px)"),c=window.matchMedia("(max-width: 767px)"),D=window.matchMedia("(min-width: 576px)"),o=window.matchMedia("(max-width: 575px)");var q=$(window);var A=navigator.userAgent,y=(A.match(/iPad/i))?"touchstart":"click";if(c.matches){$(".dummyclass").css("display","none");$("#collapsepromo_10_years_promo").on("shown.bs.collapse",function(){$("html, body").animate({scrollTop:$(".active-month").offset().top},2000)})}function h(){var L=q.outerHeight(),I=$(".page-layout").position(),K=I.top,J=L-K;$(".page-layout").css("min-height",J)}function r(K){var Q=K.offset(),M=K.width(),O=K.parents(".tabs-scrollable"),L=O.offset(),J=K.parents(".tabs-scrollable__scroll"),I=J.width(),P=L&&L.left||0,N=(Q.left-P)+M/2-I/2;J.scrollLeft(N)}function E(J){var I=[[0,"asc"]];if(typeof $this.data("ordercol")!="undefined"&&typeof $this.data("orderdir")!="undefined"){I=[[$this.data("ordercol"),$this.data("orderdir")]]}if(typeof dataTableTranslation!="undefined"){var K=dataTableTranslation}else{var K=JSON.parse('{"sProcessing":"Processing, please wait ...", "sLengthMenu": "Display _MENU_ Items", "sSearch": "Search", "sZeroRecords": "No matching records found", "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries", "sInfoEmpty": "Showing 0 to 0 of 0 entries", "sInfoFiltered": "(filtered from _MAX_ total entries)"}')}J.dataTable({responsive:true,searching:$this.data("search"),paging:$this.data("paging"),info:$this.data("info"),ordering:$this.data("ordering"),lengthChange:$this.data("length"),pageLength:$this.data("page_length"),order:I,oLanguage:{sProcessing:K.sProcessing,sLengthMenu:K.sLengthMenu,sSearch:K.sSearch,sZeroRecords:K.sZeroRecords,sInfo:K.sInfo,sInfoEmpty:K.sInfoEmpty,sInfoFiltered:K.sInfoFiltered,oPaginate:{sPrevious:"",sNext:""}},columnDefs:[{orderable:false,targets:"no-sorting"},{targets:["columnHidden"],visible:false},{width:$this.data("clmns"),targets:"_all"}]})}function e(M){var K=M.data("placement");var L=M.data("trigger");if(K!==undefined){var J=K}else{var J="bottom"}if(L!==undefined){var I=L}else{var I="hover"}M.popover({html:true,trigger:I,placement:J,content:function(){var N="#"+$(this).data("target");return $(N).php()}})}function v(){var N,M,L,J,K=$('[class*="clone-"]'),I=b("clone-",K);for(N=0;N<I.length;N++){var Q=$("."+I[N]),O=Q.find('[class*="area-"]'),P=new Array();for(M=0;M<Q.length;M++){P=b("area-",O)}for(M=0;M<P.length;M++){O=$("."+P[M]);l(O)}if(Q.hasClass("notself")===false){l(Q)}}$(".cl-middle").each(function(){$(this).css("margin-top",($(this).parent().height()-$(this).outerHeight())/2)});$(".cl-bottom").each(function(){$(this).css("margin-top",$(this).parent().height()-$(this).outerHeight())})}function l(L){var J,K=new Array(),I;L.css("height","auto");for(J=0;J<L.length;J++){K.push(L.eq(J).outerHeight())}I=Math.max.apply(Math,K);L.css("height",I)}function b(N,M){var L,J,I,K=new Array();for(L=0;L<M.length;L++){I=M.eq(L).attr("class").split(" ");for(J=0;J<I.length;J++){if(I[J].substring(0,N.length)==N){if($.inArray(I[J],K)==-1){K.push(I[J])}}}}return K}function j(){var K=window.innerWidth;var J=$(".form-group > label:first-child:not(.js-noAutoHeight)");J.outerHeight("auto");if(K>=768){if($("fieldset").length>0){$("fieldset").each(function(){var L=0;$(this).find(J).each(function(){var M=$(this).outerHeight();if(M>L){L=M}});$(this).find(J).outerHeight(L)})}else{var I=0;J.each(function(){var L=$(this).outerHeight();if(L>I){I=L}});J.outerHeight(I)}}}function k(){var I=$(".sticky-footer").outerHeight();$("#js-stickyFooterHeight").height(I)}$("#js-riskCloseButton").on("click",function(){k()});h();if($(".jscountDown--date").length>0){z()}if($('[class*="clone-"]').length>0){v()}if($(".form-group").length>0){j()}$(window).resize(function(){h();k();if($('[class*="clone-"]').length>0){v()}if($(".form-group").length>0){j()}});$(".main-header__slidebtn, .slidemenu__slidebtn").on(y,function(J){J.stopPropagation();var I=$("body"),K=$(this).attr("data-anim");if(K=="pushRight"){I.removeClass("leftMenu");I.toggleClass("rightMenu")}else{if(K=="pushLeft"){I.removeClass("rightMenu");I.toggleClass("leftMenu")}else{if(K=="pushReset"){I.removeClass("rightMenu").removeClass("leftMenu")}}}});$(document).on(y,function(J){var I=$("body");if(I.hasClass("leftMenu")||I.hasClass("rightMenu")){if(!$(J.target).closest(".slidemenu").length){I.removeClass("rightMenu").removeClass("leftMenu")}}});if(jQuery().dataTable){if($(".js-dataTB").length>0){$this=$(".js-dataTB");E($this)}}$("[data-toggle=popover]").each(function(){e($(this))});$("[data-toggle=popover]").on(y,function(I){I.preventDefault()});$(".makeAccActive").on(y,function(){var J=$(".collapsed-table__wrapper");J.removeClass("active").addClass("inactive");var I=$(this).closest(J).removeClass("inactive").addClass("active")});$(".collapsed-table__wrapper.active").insertAfter("#collapseAccntOverview > ul");$(".collapsed-table__row li a").on(y,function(I){I.stopPropagation()});$(".dropdown-item").on(y,function(I){$(".dropdown-menu").removeClass("show");I.stopPropagation()});$(".dropdownItemsLoading").on("click",function(I){$("body").addClass("loading")});$(".select-toggle").on("change",function(){var J="#"+$(this).val(),I="."+$(this).data("target");$(I).addClass("d-none");$(J).removeClass("d-none")});$(".tab-link").on(y,function(K){var I=$(this).parent().data("group"),J=$(this).data("target");$('[data-group="'+I+'"] > .tab-link').removeClass("active");$('[data-group="'+I+'"] > .tab-link[data-target="'+J+'"]').addClass("active");$('[data-group="'+I+'"] > .tab-content').addClass("d-none");$('[data-group="'+I+'"] > .tab-content[data-content="'+J+'"]').removeClass("d-none");$($.fn.dataTable.tables(true)).DataTable().columns.adjust();r($(this));K.preventDefault();if($(".form-group").length>0){j()}});$(".tabs-scrollable li.active").each(function(){var I=$(this);r(I)});$(".tab-link").each(function(){var I=window.location.pathname.replace("/",""),J=$('[data-target="'+I+'"]');J.addClass("active");if(J.length){if(window.innerWidth<=767){$("html, body").animate({scrollTop:J.offset().top},500)}}$('.tab-content[data-content="'+I+'"]').removeClass("d-none");$($.fn.dataTable.tables(true)).DataTable().columns.adjust();return false});$("#toBeChangedUsedOnlyForView").on(y,function(){$("#otpVerificationStep1").addClass("d-none");$("#otpVerificationStep2").removeClass("d-none")});$(".piechart").each(function(){var I=$(this).data("percent");$(this).append("<span></span>").css("animation-delay","-"+I+"s");if(!$(this).hasClass("piechart--rafDashboard")){$(this).append('<div class="piechart__info font--symbol">'+I+"%</>")}if(I>0&&I<100){$(this).addClass("piechart--active");$(this).parents(".loyalty__item").addClass("active")}else{if(I==100){$(this).addClass("piechart--full");$(this).parents(".loyalty__item").addClass("done")}}});$(".accordion__btn").on(y,function(){var J=$(this).data("target"),I=$(this).hasClass("active"),K=$(J).find(".accordion__collapse");if(I){K.collapse("hide");$(this).removeClass("active")}else{K.collapse("show");$(this).addClass("active")}});if(jQuery().slick){var g=$(".js-calendarSlider");var x=$(".js-paymentIconsSlider");var F=$("body").hasClass("rtl-layout");g.slick({rtl:F,dots:false,infinite:true,speed:300,slidesToShow:14,slidesToScroll:14,responsive:[{breakpoint:992,settings:{slidesToShow:8,slidesToScroll:8}},{breakpoint:576,settings:{slidesToShow:4,slidesToScroll:4}}]});$active=$(".calendar__date--current").data("slick-index");g.slick("slickGoTo",$active);x.slick({rtl:F,dots:false,infinite:true,autoplay:true,speed:200,slidesToShow:1,slidesToScroll:1})}$(".progress__wrapper").each(function(){var I=$(this).data("progress");$(this).find(".progress__bar").css("width",I+"%")});$(".js-duplicator").click(function(){elem=$(this).data("elem");appendTo=$(this).data("appendto");cloned=$(elem+":first").clone();clonedName=$(cloned).find("input").prop("name");clonedLabel=$(cloned).find("label").prop("for");clonedId=$(cloned).find("input").prop("id");clonedElements=parseInt($("input[name='"+clonedName+"']").length)+1;cloned.find("label").prop("for",clonedLabel+"-"+clonedElements).text("Additional "+clonedLabel);cloned.find("input").prop("id",clonedId+"-"+clonedElements).prop("readonly",false);cloned.find(".inputPrimary").addClass("d-none");cloned.find("input").prop("placeholder","additional_"+clonedElements);$(appendTo).append(cloned);$(this).prop("disabled",true);$(this).next(".save").removeClass("d-none");$(".save").click(function(I){cloned.find(".inputRemove,.inputMakePrimary").removeClass("d-none");cloned.find("input").prop("readonly",true);$(this).addClass("d-none");$(this).prev(".js-duplicator").prop("disabled",false)});$(".inputRemove").click(function(){$(this).parents(elem).remove()})});$(".inputRemove").click(function(){$(this).parents(".form-group").remove();console.log("click")});$(".js-btnOpenPost").click(function(I){$(".js-postListItem").addClass("d-none");$(".js-postPagination").addClass("d-none");$(".js-postSingle1").removeClass("d-none")});$(".js-btnClosePost").click(function(){$(".js-postListItem").removeClass("d-none");$(".js-postPagination").removeClass("d-none");$('[class^="js-postSingle"]').addClass("d-none")});$(".js-btnNextArticle").click(function(){$(".js-postSingle1").addClass("d-none");$(".js-postSingle2").removeClass("d-none")});$(".js-btnPreviousArticle").click(function(){$(".js-postSingle1").removeClass("d-none");$(".js-postSingle2").addClass("d-none")});var G=$(".post--single");G.each(function(){var I=$(this);I.data("orig-size",I.css("font-size"))});$(".js-btnIncrease").click(function(){B(1)});$(".js-btnDecrease").click(function(){B(-1)});$(".js-btnOrig").click(function(){G.each(function(){var I=$(this);I.css("font-size",I.data("orig-size"))})});function B(I){G.each(function(){var K=$(this);var J=parseInt(K.css("font-size"))+I;K.css("font-size",J)})}$scrollTopBtn=$(".scroll-top");if($scrollTopBtn.length>0&&C.matches){$(window).scroll(function(){if($(window).scrollTop()>=300){$scrollTopBtn.show()}else{$scrollTopBtn.hide()}});$scrollTopBtn.on(y,function(I){$("html,body").animate({scrollTop:0},"slow")})}$(".js-select-searchable").select2({theme:"classic"});$(".js-collapseBtn").on(y,function(){var I=$(this).parents(".alert").find(".alert__body");I.collapse("toggle");$(this).toggleClass("open")});$(".file-input__input").on("change",function(){var J=$(this).val();var I=J.length;var K=J.lastIndexOf("\\");if(K===-1){K=J.lastIndexOf("/")}var L=J.substr(K+1,I);$(this).parents(".file-input").find(".file-input__hidden").val(L)});$(".accordion__header a").on(y,function(I){I.stopPropagation()});$('.accordion--mdTradingTools .accordion__header a[data-toggle="modal"]').on(y,function(I){I.preventDefault();$("#tradignToolsModal").modal()});$("[name=accept-transfer]").click(function(){$("[data-target=complete_information]").trigger("click")});$("[name=step_3]").click(function(){$("[data-target=upload_documents]").trigger("click")});$("[name=step_tina_test]").click(function(){$("[data-target=upload_documents]").trigger("click")});if($(".jscountDown--date10").length>0){t()}function t(){var K=[];var J=0;$(".jscountDown--date10").each(function(){var M=$(this);if(!M.hasOwnProperty("IntervalRef")){M.IntervalRef=J}var L=setInterval(function(){I(M)},1000);K.push(L);J++});function I(Y){var T=["2020-01-31T23:59:59","2020-02-29T23:59:59","2020-03-31T23:59:59","2020-04-30T23:59:59","2020-05-31T23:59:59","2020-06-30T23:59:59","2020-07-31T23:59:59","2020-08-31T23:59:59","2020-09-30T23:59:59","2020-10-31T23:59:59","2019-11-30T23:59:59","2019-12-31T23:59:59"];var U=new Date();var N=T[U.getMonth()];var Q=new Date(N).getTime();var M=new Date().getTime();var L=Q-M;if(Y.prev().data("labels")!==undefined){var R=Y.prev().data("labels").split("|")}if(Y.data("langs")!==undefined){var P=Y.data("langs").split("|")}var X=Math.floor(L/(1000*60*60*24));var V=Math.floor((L%(1000*60*60*24))/(1000*60*60));var O=Math.floor((L%(1000*60*60))/(1000*60));var W=Math.floor((L%(1000*60))/1000);function S(Z){if(Z<10){Z="0"+Z}return Z}if(X!==0){Y.prev().php(R[0]+" <strong>"+S(X)+" "+P[0]+"</strong>")}else{Y.prev().php(R[0]);Y.php("</br>"+S(V)+"h : "+S(O)+"m : "+S(W)+"s</span>")}if(L<0){clearInterval(K[Y.IntervalRef]);Y.php(R[1]);Y.prev().remove();Y.closest(".item-row").find(".badge").php(R[1])}}}function z(){var J=[];var I=0;$(".jscountDown--date").each(function(){var M=$(this);if(!M.hasOwnProperty("IntervalRef")){M.IntervalRef=I}var L=setInterval(function(){K(M)},1000);J.push(L);I++});function K(X){if(X.data("expiring")!==undefined){var L=X.data("expiring").split("-");var P=L[2]+"-"+L[1]+"-"+L[0]+"T"+(L[3]);var R=new Date(P).getTime();var N=new Date().getTime();var M=R-N}function T(Y){if(Y<10){Y="0"+Y}return Y}var W=Math.floor(M/(1000*60*60*24));var U=Math.floor((M%(1000*60*60*24))/(1000*60*60));var O=Math.floor((M%(1000*60*60))/(1000*60));var V=Math.floor((M%(1000*60))/1000);if(X.prev().data("labels")!==undefined){var S=X.prev().data("labels").split("|")}if(X.data("langs")!==undefined){var Q=X.data("langs").split("|")}if(W!=0){X.prev().php(S[0]+" <strong>"+T(W)+" "+Q[0]+"</strong>")}else{X.prev().php(S[0])}if(+X.data("is10yearspromo")===0){X.php("</br>"+T(U)+"h : "+T(O)+"m : "+T(V)+"s</span>")}if(M<0){clearInterval(J[X.IntervalRef]);X.php(S[1]);X.prev().remove();X.closest(".item-row").find(".badge").php(S[1])}}}$(window).resize(function(){i(false)});var w=$(".js-dotsMonths");var F=$("body").hasClass("rtl-layout");$(".js-dotsMonthsInit").on("click",function(){i(true)});function i(K){var L=window.innerWidth>=1200;var J=w.hasClass("slick-initialized");var I=0;if(K){I=500}if(!L){if(!J){setTimeout(function(){s()},I)}}else{if(J){w.slick("unslick")}}}function s(){w.slick({rtl:F,dots:false,infinite:true,speed:300,slidesToShow:7,slidesToScroll:7,responsive:[{breakpoint:992,settings:{slidesToShow:6,slidesToScroll:6}},{breakpoint:768,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:576,settings:{slidesToShow:2,slidesToScroll:2}}]});$active=$(".months-slider__item--current").data("slick-index");w.slick("slickGoTo",$active)}var d=document.getElementById("copyRAFurl");if(d){d.addEventListener("click",function(){var I=document.getElementById("uniqueReferLink");I.select();document.execCommand("copy")})}function H(){var I=$("form#my_wallet_withdrawal");if(I.length){var K=I.find("#my_wallet_withdrawal_withdraw_all");var J=I.find("#my_wallet_withdrawal_amount");K.off("change").on("change",function(){var L=$(this).data("balance");var M=$(this).is(":checked");if(M){J.val(L);J.prop("readonly",true)}else{J.val("");J.removeProp("readonly")}})}}H();function n(){var L=$("#my_wallet_transaction_history #transaction_type_filter");var I=$("#my_wallet_transaction_history #trading_account_filter");var M=$("#my_wallet_transaction_history #affiliate_account_filter");var J=[];if(L.length&&L.val()){J.push(L.val())}if(I.length&&I.val()){J.push(I.val())}if(M.length&&M.val()){J.push(M.val())}var K=$(".js-dataTB").DataTable();K.columns(0).search(J.join(" ")).draw()}function f(){var J=$("#my_wallet_transaction_history");if(J.length){$("#my_wallet_transaction_history .dataTables_filter").hide();var K=$("#my_wallet_transaction_history #transaction_type_filter");var I=$("#my_wallet_transaction_history #trading_account_filter");var L=$("#my_wallet_transaction_history #affiliate_account_filter");K.off("change").on("change",function(){n()});I.off("change").on("change",function(){L.val("");n()});L.off("change").on("change",function(){I.val("");n()})}}f()});