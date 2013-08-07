<?php
// 本程序解决格子染色方案问题
// 问题描述：有8个有序号的格子，用5种颜色来染色
// 求染色方案数量
// 公式：q(g,c)=c*(q(g-1,c)+q(g-1,c-1))
// 解释：8个格子染色可以分解为先染一个格子，剩下
// 的格子使用4种颜色染色和使用3种颜色染色
// 当格子数小于颜色数时，值为0
$my=array();
for($m=1;$m<=8;$m++)
{
	$my[1][$m]=1;
}

for($n=2;$n<=5;$n++)
{
	$my[$n][1]=0;
}

for($n=2;$n<=5;$n++)
{
	for($m=2;$m<=8;$m++)
	{
		$my[$n][$m]=$n*($my[$n-1][$m-1]+$my[$n][$m-1]);
	}
}

// print_r($my[5][8]);

for($n=1;$n<=5;$n++)
{
	for($m=1;$m<=8;$m++)
	{
		print_r($my[$n][$m]."\t");
	}
	print_r("\n");
}

function q($grid,$color)
{
	$my=array();
	for($m=1;$m<=$grid;$m++)
	{
		$my[1][$m]=1;
	}

	for($n=2;$n<=$color;$n++)
	{
		$my[$n][1]=0;
	}

	for($n=2;$n<=$color;$n++)
	{
		for($m=2;$m<=$grid;$m++)
		{
			$my[$n][$m]=$n*($my[$n-1][$m-1]+$my[$n][$m-1]);
		}
	}
	return $my[$color][$grid];
}
	
$r=q(8,5);
print_r($r);

?>
