<?php
	function obtenerPromedios(){
		$alumnos = array('Leo' => $calififrcacines = array(70, 100, 100, 70, 90, 60),
						'Luis' => $calififrcacines = array(80, 90, 100, 70, 80, 85),
						'Deysi' => $calififrcacines = array(80, 100, 70, 70, 90, 85),
						'Gonzalo' => $calififrcacines = array(60, 100, 95, 70, 90, 85),
						'Manuel' => $calififrcacines = array(80, 80, 90, 70, 60, 85),
						'Esteban' => $calififrcacines = array(90, 95, 60, 70, 90, 85),
						'Jose' => $calififrcacines = array(85, 85, 100, 70, 90, 95),
						'David' => $calififrcacines = array(80, 70, 95, 70, 90, 75),
						'Octaviano' => $calififrcacines = array(80, 100, 100, 90, 90, 85),
						'Lorena' => $calififrcacines = array(70, 100, 75, 90, 90, 85));

			mostrarAlumnos($alumnos,"Alumno",array('Alumno','Programacion Web',
																	'Programacion Paralela',
																	'Lenguajes y Autómatas 2',
																	'Conmutación y Enrutamiento',
																	'Sistemas programables',
																	'Taller de invrstigación 1' ));

			mostrarVector(promedioGeneral($alumnos),"Promedio general",array('Promedio General',''));
			$promedioPorAlumno = promedioPorAlumno($alumnos);

			mostrarVector($promedioPorAlumno,"Promedio por alumno",array('Alumno' , 'Promedio'));
			promedioPorMateria($alumnos);

			$alPromedioSupGeneral = alPromSupGeneral($alumnos);
			mostrarVector(alPromSupGeneral($alumnos),"Alumnos con promedio superior al general: ".sizeof($alPromedioSupGeneral),
										 array('Alumno' , 'Promedio'));

			mostrarVector(mejorPromedio($promedioPorAlumno),"Mejor promedio por alumno",array('Alumno' , 'Promedio'));
	}

	function mostrarAlumnos($v,$titulo,$encabezados){
		echo "<h2>".$titulo."</h2>";
		echo "<table>";
		for ($i=0; $i < sizeof($encabezados) ; $i++) {
			echo "<th>".$encabezados[$i]."</th>";
		}
		foreach ($v as $key => $value) {
				echo "<tr>";
				echo "<td>".$key."</td>";
				for ($i=0; $i <sizeof($value) ; $i++) {
						echo "<td>".$value[$i]."</td>";
				}
				echo "</tr>";
			}
				echo "</table>";
	}

	function mostrarVector($v,$titulo,$encabezados){
		echo "<h2>".$titulo."</h2>";
		echo "<table>";
		for ($i=0; $i < sizeof($encabezados) ; $i++) {
			echo "<th>".$encabezados[$i]."</th>";
		}
		foreach ($v as $key => $value) {
				echo "<tr>";
				echo "<td>".$key."</td>";
				echo "<td>".$value."</td>";
				echo "</tr>";
			}
				echo "</table>";
	}

	function promedioGeneral($v){
		$sumGneral = 0;
		$elementos = 0;
		foreach ($v as $key => $value) {
			for ($i=0; $i < sizeof($value); $i++) {
				$sumGneral = $sumGneral + $value[$i];
				$elementos++;
			}
		}
		return array('Promedio general' =>($sumGneral/$elementos));
	}

	function promedioPorAlumno($v){
		$promedioPorAlumno;
			foreach ($v as $key => $value) {
				$suma = 0;
				for ($i=0; $i < sizeof($value); $i++) {
					$suma = $suma + $value[$i];
				}
				$promedioPorAlumno[$key] = $suma/sizeof($value);
			}
			return $promedioPorAlumno;
	}

	function promedioPorMateria($v){
		$promedioPorMateria = array('Programacion Web' => 0.0,
																'Programacion Paralela' => 0.0,
																'Lenguajes y Autómatas 2' => 0.0,
																'Conmutación y Enrutamiento' => 0.0,
																'Sistemas programables' => 0.0,
																'Taller de invrstigación 1' => 0.0);
		$i=0;
		echo "<h2>Promedio por Materia</h2>";
		echo "<table>";
		echo "<th>MATERIA</th>";
		echo "<th>PROMEDIO</th>";
			foreach ($promedioPorMateria as $key => $value) {
				$promedioPorMateria[$key] = promedioMateria($v,$i);
				echo "<tr>";
				echo "<td>".$key."</td>";
				echo "<td>".$promedioPorMateria[$key]."</td>";
				echo "</tr>";
				$i++;
			}
			echo "</table>";
	}

	function promedioMateria($v, $i){
		$numAlumnos = 0;
		$sumatoria= 0.0;
		foreach ($v as $key => $value) {
			$numAlumnos++;
			$sumatoria += $value[$i];
		}
		return ($sumatoria/$numAlumnos);
	}

	function alPromSupGeneral($v){
		$promGenral = promedioGeneral($v)['Promedio general'];
		$promAlumnos =  promedioPorAlumno($v);
		$resultado;
		foreach ($promAlumnos as $key => $value) {
			if ($value > $promGenral) {
				$resultado[$key] = $value;
			}
		}
		return $resultado;
	}

	function mejorPromedio($v){
		$promedio = 0.0;
		$alumno = '';
		foreach ($v as $key => $value) {
				if ($promedio < $value) {
					$promedio = $value;
					$alumno = $key;
				}
		}
		return array($alumno => $promedio);
	}
 ?>
