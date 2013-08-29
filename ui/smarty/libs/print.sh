#!/bin/bash
now=`date '+%D %H:%M:%S'`
echo "==========================================" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} Job ${pic_id} started at ${now}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} masterimage_path=${masterimage_path}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} PRINT_MASTER_DIR=${PRINT_MASTER_DIR}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} ORIG_WIDTH_TIMES_2=${ORIG_WIDTH_TIMES_2}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} ORIG_HEIGHT_TIMES_2=${ORIG_HEIGHT_TIMES_2}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} ORIG_WIDTH=${ORIG_WIDTH}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} ORIG_HEIGHT=${ORIG_HEIGHT}" >> /var/log/instapi_print.log
echo "INFO  ${pic_id} PIC_DIR=${PIC_DIR}" >> /var/log/instapi_print.log

masterimage_path=${PRINT_MASTER_DIR}/${pic_id}.jpg
pic1_path=${PIC_DIR}/${pic_id}_1.jpg
pic2_path=${PIC_DIR}/${pic_id}_2.jpg
pic3_path=${PIC_DIR}/${pic_id}_3.jpg
pic4_path=${PIC_DIR}/${pic_id}_4.jpg
convert -size ${ORIG_WIDTH_TIMES_2}x${ORIG_HEIGHT_TIMES_2} xc:white \
    \( $pic4_path -resize ${ORIG_WIDTH}\> \) -geometry +0+0 -composite \
    \( $pic3_path -resize ${ORIG_WIDTH}\> \) -geometry +${ORIG_WIDTH}+0 -composite \
    \( $pic2_path -resize ${ORIG_WIDTH}\> \) -geometry +0+${ORIG_HEIGHT} -composite \
    \( $pic1_path -resize ${ORIG_WIDTH}\> \) -geometry +${ORIG_WIDTH}+${ORIG_HEIGHT} \
    -composite ${masterimage_path} >> /var/log/instapi_print.log 2>&1
chmod 0666 ${masterimage_path}

echo "INFO  ${pic_id} Print-Master file ${masterimage_path} created." >> /var/log/instapi_print.log

if [ -f ${masterimage_path} ]; then
#    options="-d cp900_520 -n 1 -s -t ${pic_id} -o media=Custom.15x10cm -o landscape -o scaling=100 --";
    options="-d cp900_520 -n 1 -s -t ${pic_id} -o scaling=100 --";
    lp ${options} ${masterimage_path} >> /var/log/instapi_print.log 2>&1
    echo "INFO  ${pic_id} File ${masterimage_path} printed with options ${options}" >> /var/log/instapi_print.log
else
    echo "ERROR ${pic_id} File not found ${masterimage_path}" >> /var/log/instapi_print.log
fi

now=`date '+%D %H:%M:%S'`
echo "INFO  ${pic_id} Job ${pic_id} done at ${now}" >> /var/log/instapi_print.log
