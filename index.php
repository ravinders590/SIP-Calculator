<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIP Calculator</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>
<body>
	<section class="sip-wrapper" style="background-image: url('bg.jpg');">
		<div class="sip-content-box">
			<?php 

				$error = '';
				if(isset($_POST['calculate'])){
					
					$data = array(
						'month_invest' => $_POST['month_invest'],
						'month_roi' => $_POST['month_roi'],
						'total_time' => $_POST['total_time'],
					);
					// P × ((1 + i)n - 1) / i) × (1 + i)
					$invest = $data['month_invest'];
					$returnRate = $data['month_roi'];
					$year = $data['total_time'];
					if($invest == '' || $returnRate == '' || $year == '' ){
						
						$error = "Please fill all the fields!";

					}else{

						$monthlyrate = $returnRate/12/100;
						$month = $year*12;
						$future_val = $invest * ((pow(1+$monthlyrate, $month)-1)/$monthlyrate)*(1+$monthlyrate);
						$investamt = $invest*12*$year;
						$est_return = $future_val - $investamt;

					}
					
				}
			 ?>
			<h2>SIP Calculator</h2>
			<div class="sip-form-box">
				<form action="" method="post">
					<div class="form-group">
						<i class="fa fa-inr" aria-hidden="true"></i>
						<input type="number" name="month_invest" placeholder="Monthly Investment" class="form-control month_invest">
					</div>
					<div class="form-group">
						<i class="fa fa-percent" aria-hidden="true"></i>
						<input type="number" name="month_roi" placeholder="Expected Return Rate" class="form-control month_roi">
					</div>
					<div class="form-group">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<input type="number" name="total_time" placeholder="Year" class="total_time form-control">
					</div>
					<button type="submit" name="calculate" id="calculate" class="btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Calculate</button>
					<?php echo $error; ?>
				</form>
				<table>
					<tbody>
						<tr>
							<th align="left">Invested Amount</th>
							<td class="invest_amt"><i class="fa fa-inr" aria-hidden="true"></i><?php echo number_format(@$investamt);?></td>
						</tr>
						<tr>
							<th align="left">Est. returns</th>
							<td class="est_roi"><i class="fa fa-inr" aria-hidden="true"></i><?php echo number_format(@$est_return);?></td>
						</tr>
						<tr>
							<th align="left">Total value</th>
							<td class="total_profit"><i class="fa fa-inr" aria-hidden="true"></i><?php echo number_format(@$future_val);?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		/*$(function(){
			var month_invest = $('.month_invest').val();
			var month_roi = $('.month_roi').val();
			var total_time = $('.total_time').val();
			var total_profit = 0;
			$('#calculate').on('click',function(e){
				e.preventDefault();
				M = P × ({[1 + i]n – 1} / i) × (1 + i).
				var total_est = (1+month_roi)*month_invest/month_roi; 
				console.log(total_est);
				var total = month_invest;
			})
		});*/
	</script>
</body>
</html>