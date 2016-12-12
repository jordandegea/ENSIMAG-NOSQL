OUT_NAME=noSQL_MSBigData_Group09

help:
	@echo "Indiquez une règle \n\
	 - datas : pour générer des données dans un fichier 'datas.txt' \
	"

datas:
	cd populate && php ./generate.php > ../datas.txt

doc: 
	cd rapport && pdflatex -q rapport.tex > /dev/null

package: datas doc
	mkdir -p ${OUT_NAME}
	cp -R requests ${OUT_NAME}/
	cp -R populate ${OUT_NAME}/
	cp datas.txt ${OUT_NAME}/
	cp README.md ${OUT_NAME}/
	cp rapport/rapport.pdf ${OUT_NAME}/
	tar -cvf ${OUT_NAME}.tar.gz ${OUT_NAME}
	rm -Rf ${OUT_NAME}