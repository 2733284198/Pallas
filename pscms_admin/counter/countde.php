<?

/*<script src="../count/count.php?id=1"></script>*/


	if(!isset($id))				//�������дidֵ���趨Ĭ��ֵ
	{
		$id=1;
	}

	$file="data/".$id.".php";	//��¼���ݵ��ļ�

	if(!file_exists($file))		//�ж��Ƿ�����ļ�
	{
		//chmod("data/",0777);	//�޸��ļ�������
		fopen($file,'w+');
	}

	//if(!is_writeable($file))	//�ж��ļ��Ƿ��д
	//{
		//chmod($file,0777);		//�޸��ļ�����
	//}

	$fo=fopen($file,"r");		//���ļ�
	$fg=fgets($fo,10000);		//��ȡ����
	
	if($fg=='')$fg=0;

	//$fg++;

	$fo2=fopen($file,'w+');		//�Կ�д��ʽ���ļ�
	fputs($fo2,$fg);

	$fg=sprintf("%06s",$fg);	//�޸Ĵ˴��� %06s Ϊ %08s �Ϳ��԰���λ��������Ϊ8λ��������
	$mc=chunk_split($fg,1,'|');		//ÿ��һ���ַ�����һ��|��
	$arr=explode('|',$mc);		//��|���п����������
	echo "muhang='';\n";

	for($i=0;$i<count($arr);$i++)
	{
		if($arr[$i]!='')
		{
			echo "muhang+='<img src=../counter/countimg/".$arr[$i].".png>';\n";
		}
	}

	echo "document.write(muhang);";	//���

?>