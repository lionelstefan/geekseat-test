<?php
	class Person {
		public $age_of_death;
		public $year_of_death;
		public $year_born;
		public $people_killed_by_year;

		public function set_aod($aod)
		{
			$this->age_of_death = $aod;
		}

		public function set_yod($yod)
		{
			$this->year_of_death = $yod;
		}

		public function get_aod()
		{
			return $this->age_of_death;
		}

		public function get_yod()
		{
			return $this->year_of_death;
		}

		public function calc_year_born()
		{
			if (
				$this->age_of_death > 0 && $this->year_of_death > 0 
				&& ($this->year_of_death - $this->age_of_death) > 0
			)
			{
				$this->year_born = $this->year_of_death - $this->age_of_death;
			}
		}

		public function get_people_killed_by_year()
		{
			$result = [];
			$result[0] = 0;
			$result[1] = 1;
			$seed = 0;
			$now = 1;
			for ($i = 0; $i < $this->year_born; $i++)
			{
				array_push($result, $seed + $now);

				$seed = $now;
				$now = $result[count($result) - 1];
			}
			
			unset($result[0]);
			unset($result[$this->year_born + 1]);

			return array_sum($result);
		}
	}
?>
