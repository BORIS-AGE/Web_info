<?php require_once "pclzip.lib.php";

 $timer = new PclZip("timer.zip"); // �������� ������ ������ � ������� 

 $timer->extract(); // ����������

 $timer->extract(PCLZIP_OPT_PATH, 'zz'); // ���������� � �����


  $var = $timer->extract( // � ���������� ���������� ��� �������� ������ ( ������ ���, ���������� ����� var_damp
        PCLZIP_OPT_BY_PREG, '/\.js/', // ����� �� ��������� 
        PCLZIP_OPT_PATH, 'zz'
        PCLZIN_OPT_SET_CHMOD, '0777' // ������ ��� ������
        PCLZIP_OPT_REMOVE_ALL_PATH // ������� ��� �����, ��� ����� ������
        PCLZIP_OPT_REMOVE_PATH, 'js' // �� ���������� ����� ��� � ������ 
        PCLZIP_CB_PRE_EXTRACT, 'my_func', // ����� ������� �� ��������� ������
        PCLZIP_CB_POST_EXTRACT, 'my_func2' // ����� ������� �����  ��������� ������
        ������� ��������� 2 ��������� $p_event - �� $p_header - ��� �������� ������, ������� 1 ��� ����� ������� 
    );

$arh = new PclZip("archive.zip"); // ������ �����
$arh->create(
    'pclzip.lib.php', // ��� �����, ������� ��� ���������
    'arh', // ����� ��� ����� ����� 
    PCLZIP_OPT_NO_COMPRESSION, // ������� ��� ������
    PCLZIP_OPT_ADD_PATH, 'one'
    PCLZIP_OPT_REMOVE_ALL_PATH // ��������� ��� �����, ��� ����� ������
    PCLZIP_OPT_COMMENT,'Add comment'// ��������� ����������� 
    PCLZIP_CB_PRE_ADD, 'my_func', // ����� ������� �� �������� ������
    PCLZIP_sCB_POST_ADD, 'my_func2' // ����� ������� �����  �������� ������
      
);
$arh->listContent(); // ���������� ������ � ���������������� ������, � �������� ��������

$arh->properties(); // ����� ������ 

$arh->add(
        array("index.php"), // �������� ������ ���������
        PCLZIP_OPT_COMMENT, 'add_comment1',// �������� �����������
        PCLZIP_OPT_ADD_COMMENT, 'new comment2', // ���������� ����������
        PCLZIP_OPT_PREPEND_COMMENT, 'prev comment2', // ���������� ���������� ����� ����������
        PCLZIP_OPT_NO_COMPRESSION, // ������� ��� ������
        PCLZIP_OPT_ADD_PATH, 'one' // ���������� � �����
        
);







