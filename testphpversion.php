<?php
///
	//phpinfo();

	/*interface inHello {
		  function inSenddata();
	}
	abstract Class abHello {
		
		abstract protected function senddata();
		
		public function showData(){
			return "abstract Class<br>";
		}
	}



	Class Hello extends abHello implements inHello {
		private $as;

		
		public  function inSenddata(){
			echo "Interface Show data";
		
		}
		public function senddata(){
			echo "abstract senddata<br>";
		}
		public function input($dat){
			if($dat > 20){
				 $this->as = $dat - 5; 	
			}else{
				$this->as = "pleass fill data > 20 ";
			}
		}
		
		public function getdata(){
			return $this->as;
		}
		
	}


	$clHell = new Hello();
	$clHell->inSenddata();
	$clHell->senddata();
	echo $clHell->showData();

	$clHell->input(30);
	echo $clHell->getdata();*/
///

?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<body>
<div id="vue">
	
	{{ message }}
</div>

<script type="text/javascript">
	
	const app = new Vue({
		el:'#vur',
		data:{
			message: 'Aneg'
		}
	})
</script>
</body>
</html>
