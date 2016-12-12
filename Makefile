

help:
	@echo "Indiquez une règle \n\
	 - datas : pour générer des données dans un fichier 'datas.txt' \
	"

datas:
	cd populate && php ./generate.php > ../datas.txt

