$(document).ready(function() {
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $("#complete1").click(function() {
        $(".form-intro .form-control").each(function() {
            if ($(this).val() == "") {
                $(this).effect("shake", { times: 3 }, 100);
                $("#error1")
                    .text("Input can not be left blank")
                    .show();
                $(".btn-back").trigger("click");
            } else {
                $("#error1")
                    .text("")
                    .hide();
                // $('#complete1.btn-next').bind("click");
            }
        });
    });
    $(".btn-next").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent().parent().parent().parent();
        next_fs = $(this).parent().parent().parent().parent().next();

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = now * 50 + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    transform: "scale(" + scale + ")",
                    position: "absolute"
                });
                next_fs.css({ left: left, opacity: opacity });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: "easeInOutBack"
        });
    });

    $("#complete2").click(function() {
        if ($("#input-file-main-hustle").val() == "") {
            $(this).effect("shake", { times: 3 }, 100);
            $("#error2")
                .text("No file selected")
                .show();
            $("#complete2.btn-next").unbind("click");
            $(".btn-back").bind("click");
        } else {
            $("#error1")
                .text("")
                .hide();
            $("#complete2.btn-next").bind("click");
            $(".btn-next").click(function() {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent().parent().parent().parent();
                next_fs = $(this).parent().parent().parent().parent().next();

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = now * 50 + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            transform: "scale(" + scale + ")",
                            position: "absolute"
                        });
                        next_fs.css({ left: left, opacity: opacity });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: "easeInOutBack"
                });
            });
        }
    });

    $(".btn-back").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent().parent().parent().parent();
        previous_fs = $(this).parent().parent().parent().parent().prev();

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = (1 - now) * 50 + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({ left: left });
                previous_fs.css({
                    transform: "scale(" + scale + ")",
                    opacity: opacity,
                    position: "relative"
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: "easeInOutBack"
        });
    });

    $(".submit").click(function() {
        return false;
    });
});

$(document).ready(function() {
    //Easy Scroll
    $("#start-scroll").click(function(e) {
        e.preventDefault();
        $("html, body").animate({
                scrollTop: $("#start").offset().top
            },
            1500
        );
    });
});

$(document).ready(function() {
    // preventing page from redirecting
    $("#home").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
    });

    $("#home").on("drop", function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
});

$(document).ready(function() {
    function readURL2(input) {
        // console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#side-hustle-prev").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
            $("#side-hustle-prev-case").show();
        }
    }

    $("#input-file-side-hustle").change(function() {
        readURL2(this);
        $("#morethan #step-side-hustle label").addClass("hide-me");
    });

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

    $('#input-file-side-hustle').change(function(event){

        $("#morethan #step-side-hustle label").addClass("hide-me");

		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:700,
			height:700
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
                // $("#side-hustle-prev").attr("src", base64data);
                // $("#input-file-side-hustle-crop").attr("value", base64data);
				// $modal.modal('hide');
                // $("#side-hustle-prev-case").show();
				$.ajax({
					url:'/ceo-awards/save_image.php',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
                        $("#side-hustle-prev").attr("src", data);
                        // reader.readAsDataURL(input.files[0]);
                        $("#side-hustle-prev-case").show();
                        $("#input-file-side-hustle-crop").attr("value", data);
					}
				});
			};
		});
	});

});
