<?php
	require('Person.php');

	class App
	{
		public function __constructor()
		{
			$this->run();
		}

		public function run()
		{
			$PersonA = new Person();
			$PersonB = new Person();
			echo "input age of death and year of death : \n";
			echo "Person A age of death : ";
			$this->get_input($PersonA, 'aod');
			echo "Person A year of death : ";
			$this->get_input($PersonA, 'yod');
			echo "\n";
			$this->aod_yod_check($PersonA);

			echo "Person B age of death : ";
			$this->get_input($PersonB, 'aod');
			echo "Person B year of death : ";
			$this->get_input($PersonB, 'yod');
			echo "\n";
			$this->aod_yod_check($PersonB);
			
			$PersonA->calc_year_born();
			$PersonB->calc_year_born();

			$average = ($PersonA->get_people_killed_by_year() + $PersonB->get_people_killed_by_year())/2;

			
			echo "Average is : " . $average . "\n";
			exit();
		}

		private function aod_yod_check($person)
		{
			if ($person->age_of_death > $person->year_of_death)
			{
				echo "incorrect input";
				exit();
			}
		}
		
		private function hasMinusSign($value) {
			return (substr(strval($value), 0, 1) == "-");
		}

		private function get_input($person, $input)
		{
			$setter = null;
			$get_cmd = readline();

			if ($get_cmd == '')
			{
				echo 'must input value';
				exit();
			}

			if ($this->hasMinusSign($get_cmd))
			{
				echo 'incorrect value';
				exit();
			}

			if ($input == 'aod')
			{
				$person->set_aod(
					(int)$get_cmd
				);
			}

			if ($input == 'yod')
			{
				$person->set_yod(
					(int)$get_cmd
				);
			}
		}
	}

$app = new App();
$app->run();
?>
