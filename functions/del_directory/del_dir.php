<?php 
	/*
	* How to recursively delete a directory and its entire contents (files + sub dirs) in PHP?
	* PHP function to delete all files: In the following code, first passing the path of directory which need to delete. It checks whether the file or directory which need to delete is actually present/exist or not. If it does exist then it will open the file check whether there is something in that file or not. If not then delete the directory using rmdir directory. But if any other files are present in the directory if then it will delete the files using unlink function except the . and .. files which means the system files. After deleting all the stuff just use the rmdir function to delete the directory completely.
	*/

	// Variable to store directory name 
	// which need to delete 
	$folder = 'temp_files'; 

	// Get the list of all of file names 
	// in the folder. 
	$files = glob($folder . '/*'); 
	// echo "<pre>";
	// print_r($files);
	// exit;

	// Loop through the file list 
	foreach($files as $file) { 
		
		// Check for file 
		if(is_file($file)) { 
			echo "{$file} file deleting ..."."<br>";
			// Use unlink function to 
			// delete the file. 
			unlink($file); 

		} 
	} 
 ?>