# Python3, dipakai untuk melakukan test security OWASP10, terhadap aplikasi yang sengaja dibuat non-secure

import requests, urllib3
urllib3.disable_warnings()

baseUrl = "https://w2.swift.id/test/"

def signUp( loop = 1 ) :
  query = { 'fullname' : 'Eko Rudi', 'email' : 'ekorudi5@gmail.com', 'password' : 'a12345678' }
  for i in range( loop  ) :
    print( "actSignup.php")
    r = requests.post( baseUrl + '/function/actSignup.php', data=query, verify=False )
    print( r, i  )
    print( r.text )

def astUpdateProfile( loop = 1 ) :
  for i in range( loop  ) :
    print( "actUpdateProfile.php")
    ifiles = {'userfile': ('php', open('info.php','rb').read())}
    r =  requests.post( baseUrl + '/function/actUpdateProfile.php', files=ifiles, verify=False )
    print( r )
    print( r.text )

def actForgotPassword(loop= 1) :
  for i in range( loop  ) :
    print( "actForgotPassword.php")
    idat = { 'email' : 'example_email@example.com'}
    r =  requests.post( baseUrl + '/function/actForgotPassword.php?hash=2295db791437b1159bb0cc544fccd572354faf1d', data=idat, verify=False )
    print( r )
    print( r.text )


signUp()
astUpdateProfile()
actForgotPassword()
