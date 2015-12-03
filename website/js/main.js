var linkBase = "./";
var loadedPages = [];

$(document).ready(function(){
	//no point reinventing the wheel, so we will use this basic image slider plugin to save time
	//image slider plugin (no button settings)
	$(".titleSlider").slidesjs({
		width: 1000,
		height: 350,
		navigation: {
			active: false
		},
		pagination: {
			active: false
		},
		play: {
			active: false,
			effect: "slide",
			interval: 5000,
			auto: true
		},
		effect: {
			slide: {
				speed: 2000
			}
		}
	});
	
	
	//loads the initial page
	loadPage();
	
	
	//the a href="#page" will change the hash triggering this event
	$(window).on("hashchange",function(){
		//then change page 
		loadPage();
	});
});

function loadPage(){
	//check what page we are at
	var theUrl = window.location.hash.substr(1).toString().toLowerCase();
	
	if(theUrl == "portfolio"){//check if we are switching to the portfolio page
		//and then add the extra acknowledgements
		$(".footerAdition").html(", Image &quot;A Neon Grid Effect Backdrop With City&quot; courtesy of Victor Habbick at FreeDigitalPhotos.net, Image &quot;Bangkok City&quot; courtesy of samarttiw at FreeDigitalPhotos.net");
	}
	else{
		//reset the extra footer text as its not needed on any other pages
		$(".footerAdition").html("");
	}
	
	var key = $.inArray(theUrl, loadedPages);
	
	if(key > -1){
		$(".pages").hide();
		$("." + loadedPages[key]).show();
		//set page title
		$("title").text("TK Digital Arts | " + theUrl.substr(0,1).toUpperCase()+theUrl.substr(1));
		//highlight the page button to show that this page is that page and disable the other highlight
		$("a.highlight").removeClass("highlight");
		$("a[href='#" + theUrl + "']").addClass("highlight");
	}
	else{
		console.log("loading " + linkBase + "pages/" + theUrl + ".html");
		
		$.ajax({
			url: linkBase + "pages/" + theUrl + ".html",
			dataType: "html",
			
			success: function(data) {
				$(".pages").hide();
				//record this page as loaded
				loadedPages.push(theUrl);
				//set page content
				$(".content").append(data);
				//set page title
				$("title").text("TK Digital Arts | " + theUrl.substr(0,1).toUpperCase()+theUrl.substr(1));
				//highlight the page button to show that this page is that page and disable the other highlight
				$("a.highlight").removeClass("highlight");
				$("a[href='#" + theUrl + "']").addClass("highlight");
			},
			
			error: function(x,e) {
				var key = $.inArray(theUrl, loadedPages);
				
				if(key > -1){
					$(".pages").hide();
					$(".home").show();
				}
				else{
					//we got an error most probably the page doesn't exist so load home page and log warning
					$.ajax({
						url: linkBase + "pages/home.html",
						dataType: "html", 
						
						success: function(data) {
							$(".pages").hide();
							//reccord homepage
							loadedPages.push("home");
							//set content
							$(".content").append(data);
						}
					});
				}
				
				//set homepage as the selected page
				$("a.highlight").removeClass("highlight");
				$("a[href='#home']").addClass("highlight");
				
				//set page title
				$("title").text("TK Digital Arts | Home");
				
				console.warn("Page not found: 'pages/" + theUrl + ".html'");
			}
		});
	}
}
