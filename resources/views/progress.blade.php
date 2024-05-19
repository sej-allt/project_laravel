<!-- resources/views/progress.blade.php -->

<div id="progress-bar" style="width: 0%; background-color: #4CAF50;"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var progressInterval = setInterval(function(){
            $.ajax({
                url: "{{ route('progress') }}",
                method: "GET",
                success: function(data){
                    var progress = data.progress;
                    $('#progress-bar').css('width', progress + '%').text(progress + '%');
                    if(progress >= 100){
                        clearInterval(progressInterval);
                    }
                }
            });
        }, 1000);
    });
</script>
