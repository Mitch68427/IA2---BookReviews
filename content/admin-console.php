//code for selecting which directory your travelling to on the website

BEGIN
	LIST directory = ["home","curriculm","contactus","login"]
	
	IF directory = "home" //if directory is home take them to the home page
		return home.html;
		ELSEIF directory = "curriculm" //if directory is curriculm take them to the curriclum page
			return curriculm.html;
			ELSEIF directory = "contactus" //if directory is contactus take them to the Conatact us page
				return contactus.html;
				ELSEIF directory = "login" //if directory is login take them to the Log In page
					return login.html;
	ENDIF
END



//pcode for logging in or signing up
BEGIN
	INPUT username = a      //where the user inputs there username
	INPUT password = b      //where the user inputs there password
	
	INPUT signUp = +validUsername[""],+validPassword""]    //This adds to the validUsername & validPassword logging system
	
	LIST validUsername = ["user1","user2","user3"]         //A database/logging for valid/registered usernames
	LIST validPassword = ["password1","password2,"password3"]  //A database/logging for valid/registered password
		
		IF a = validUsername && b = validPassword         //if the username/password entered is in logs return correct
			print "password correct"
				ELSEIF a ≠ validUsername && b ≠ validPassword     //if it isnt in logs return user or passoword incorrect
					print "Username or password incorrect"
						ELSEIF a = validUsername && b ≠ validPassword
							print "Username or password incorrect"
								ELSEIF a ≠ validUsername && b = validPassword
									print "Username or password incorrect"
		ENDIF
END
				
				
				
//text changer given which page the user is on
BEGIN
	LIST pages = ["Home","curriculm","contactus","login"]    //possible pages
	INPUT a = home page text     //title text
	INPUT b = curriculm text
	INPUT c = contact us text
	INPUT d = Login text
	
	IF pages = "Home"
		print "a"
			IFELSE pages = "curriculm"
				print "b"
					IFELSE pages = "contactus"
						print "c"
							IFELSE pages = "login"
								print "d"
	ENDIF
END

