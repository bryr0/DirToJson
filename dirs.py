import os
from pprint import pprint

def sdir(path):
	c=0
	elements={}
	if not os.path.isdir(path) or not os.access(path, os.R_OK):
		raise Exception('pls check path or permits')
	try:
	 	dirs= os.listdir(path)
	except Exception as e:
		p=path.split("/")
		elements[p[len(p)-2]]="denied access"
		return elements

	for value in dirs:
		if os.path.isdir(path+value):
			pdir=value.replace(path,"").strip("")
			sub=sdir(str(path+value+"/"))
			elements[str(pdir)]=sub
		else:
			elements[c]=str(value)
		c=c+1
	return elements

if __name__ == '__main__':
	pprint(sdir("audio/"))
	#pprint(sdir("audio/"))

	#print ("C:/Users/Bryro/AppData/Local/Application Data/").split("/")[5]