$(document).ready(function() {
    $("#imageUpload").change(function() {
        var formData = new FormData();
        var fileInput = document.getElementById("imageUpload");
        var file = fileInput.files[0];

        if (file) {
            formData.append("image", file);

            $.ajax({
                url: "upload.php", // PHP script to handle the upload
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percent = (evt.loaded / evt.total) * 100;
                            $("#uploadProgress").val(percent);
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    //$("#message").html(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    $("#message").html("Upload failed: " + error);
                }
            });
        } else {
            $("#message").html("Please select an image file.");
        }
    });
});
