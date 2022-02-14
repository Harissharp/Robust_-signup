
# Robust signup 
This is a robust signup form that uses a mySql database, the functions used are within functions.php however not all of them are used as most of this work is pulled from another project. Heres a run down fo the functions actually used ( self created)

# Functions:
validate_email($uEmail); This validates the email checking if it contains the needed parts eg @ , .com/.co.uk etc

$conn=setupconnection_sqli(); this sets up a conntetion to database the code uses * please do change

testconnection_sqli($conn); checks the conenction made is working or not

setLoggedStatus($result); more used in other future devolpemnt as the 'logged?' session var can be used with session checking code to make sure
the user is logged in
