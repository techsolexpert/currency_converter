<!DOCTYPE html>
<html lang="en">
<head>
  <title>Currency Converter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2><center>Currency Converter</center></h2>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="email">From:</label>
      <select name="from" id="from" class="form-control" onchange="current()">
        @foreach($curr as $cur)
        <option value="{{ $cur }}" >{{ $cur }}</option>
        @endforeach
      </select>
    </div>
     <div class="form-group">
      <label for="email">To:</label>
      <select name="to" id="to" class="form-control" onchange="after_selected()">
        @foreach($curr as $cur)
        <option value="{{ $cur }}" >{{ $cur }}</option>
        @endforeach
      </select>
    </div>
     <div class="form-group">
      <label for="email">Amount:</label>
      <input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount" onblur="converter()">
      <span id="amount_message" style="color:red"></span>
    </div>
    
 <h4>Result : <span id="result">
    </span></h4>

    </div>
    

  </form>
</div>

</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"></script>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function current(){
    amount = $("#amount").val();

    if(amount!=''){
        converter();
    }
}
function after_selected(){
    amount = $("#amount").val();
    if(amount!=''){
        converter();
    }
}

function converter(){
    from = $("#from").val();
    to = $("#to").val();
    amount = $("#amount").val();
    result = $("#result").val();

     if(amount==''){
        $('#amount_message').text('*Please enter amount');
     }else{

         $('#amount_message').text('');
         $.ajax({
          url:"{{ url('/converter') }}",
          method:"GET",
          data:{from:from,to:to,amount:amount},
          beforeSend:function(value){
             $('#result').css('color','red','fontSize','14px');
             $('#result').html("<span>Converting...</span>");
          },
          success: function(result){
             $('#result').css('color','green');
              $('#result').html(result);

          }
      });
     }

     }

</script>