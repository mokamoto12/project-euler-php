# Project Eulerをオブジェクト指向っぽく解く（PHP）
[![Build Status](https://travis-ci.org/mokamoto12/project-euler-php.svg?branch=master)](https://travis-ci.org/mokamoto12/project-euler-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mokamoto12/project-euler-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mokamoto12/project-euler-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mokamoto12/project-euler-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mokamoto12/project-euler-php/?branch=master)

## 目次
1. 問題文
2. 問題文を抽象化する
3. 抽象化した問題文をPHPのコードで表す
4. もうちょっと具体的に考える、問題（Problem）を実装する
5. Problem1を解く
    1. 仕様（Specification）を実装する
    2. 数列（Sequence）を実装する
    3. 実行する
6. Problem2を解く
    1. 仕様（Specification）を実装する
    2. 数列（Sequence）を実装する
    3. 実行する
7. まとめ

## 問題文

### Problem1

> 10未満の自然数のうち, 3 もしくは 5 の倍数になっているものは 3, 5, 6, 9 の4つがあり, これらの合計は 23 になる.
> 
> 同じようにして, 1000 未満の 3 か 5 の倍数になっている数字の合計を求めよ.

### Problem2

> フィボナッチ数列の項は前の2つの項の和である. 最初の2項を 1, 2 とすれば, 最初の10項は以下の通りである.
> 
> 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...
> 
> 数列の項の値が400万以下の, 偶数値の項の総和を求めよ.

引用：http://odz.sakura.ne.jp/projecteuler/

## 問題文を抽象化する

Problem1とProblem2はどちらも

「ある数列(Sequence)の中からある仕様(Specification)を満たす(satisfy)数を抽出(filter)し、その数を使って問題(Problem)を解く(resolve)」

というように抽象化して考えることができます。

具体的な問題文を上の抽象化した文に当てはめると

### Problem1

「1000未満の自然数の数列の中から3か5の倍数になっている数を抽出し、その数の総和を求める」

### Problem2

「項の値が400万以下のフィボナッチ数列の中から偶数になっている数を抽出し、その数の総和を求める」

という様に言うことができます。


## 抽象化した問題文をPHPのコードで表す
抽象化した文の中には以下の3つの抽象があります。また、抽象はそれぞれ次のようにふるまいます。

* 数列 - Sequence
    * 仕様にしたがって数を抽出する - filteredBy(Specification $specification): array
* 仕様 - Specification
    * 数が仕様を満たすか - isSatisfiedBy(int $num): bool
* 問題 - Problem
    * 解く - resolve(): int

また、PHPのコードにすると
* 数列
```
interface Sequence
{
    public function filteredBy(Specification $specification): array
}
```
* 仕様
```
interface Specification
{
    public function isSatisfiedBy(int $num): bool
    public function and(Specification $specification): Specification
    public function or(Specification $specification): Specification
    public function not(): Specification
}
```
参考：https://en.wikipedia.org/wiki/Specification_pattern

* 問題
```
interface Problem
{
    public function resolve(): int
}
```


## もうちょっと具体的に考える、問題（Problem）を実装する

抽象化した文を実装していくために問題をもうちょっと具体的に考えてみましょう。

Problem1とProblem2は共通して「総和を求める問題(SumProblem)」です。

総和を求める問題を実装すると以下のようになります。

* 総和を求める問題
```
class SumProblem implements Problem
{
    private $sequence;
    private $specification;

    public function __construct(Sequence $sequence, Specification $specification)
    {
        $this->sequence = $sequence;
        $this->specification = $specification;
    }

    public function resolve(): int
    {
        return (int)array_sum($this->sequence->filteredBy($this->specification));
    }
}
```

SumProblemのresolveでは数列から仕様を満たすものを抽出しその総和を求めています。

具体的な数列(Sequence)と仕様(Specification)は外部から注入することで、

SumProblemは数列と仕様の実装の詳細に依存することなく、抽象(Interface)に依存して実装をおこなうことができます。

抽象(Interface)に対して実装を行うことで、依存オブジェクトの詳細な実装が終わっていなくても、

抽象のようにふるまうモックを用意することでテストを行うことができます。

つぎにProblem1についてSpecificationとSequenceを具体的に考えて実装していきましょう。

## Problem1を解く

まずは、Problem1について考えていきます。

### 仕様（Specification）を実装する

Problem1の値の仕様は、

「3か5の倍数」

です。

今回は仕様を実装するにあたって、Specificationパターンを用いるので、

「~か~」という仕様にはSpecificationのor()メソッドを用いることができます。

Specificationの基底クラスであるCompositeSpecificationを予め実装しています。

https://github.com/mokamoto12/project-euler-php/tree/master/src/Problem/Specification/Composite

* 倍数の仕様

```
class MultipleSpecification extends CompositeSpecification
{
    private $divisor;

    public function __construct(int $divisor)
    {
        $this->divisor = $divisor;
    }

    public function isSatisfiedBy(int $num): bool
    {
        return $num % $this->divisor === 0;
    }
}
```

MultipleSpecificationを用い「3か5の倍数」という仕様を表すには

```
$specification = (new MultipleSpecification(3))->or(new MultipleSpecification(5));
```

というようにします。

### 数列（Sequence）を実装する

Problem1の数列は

「1000未満の自然数の数列」

です。

PHPにはrangeという範囲を指定して数の配列を作ってくれる関数があるのでそれを使います。

* 自然数の数列

```
class NaturalSequence implements Sequence
{
    private $sequence;

    public function __construct(int $below)
    {
        $this->sequence = range(1, $below - 1);
    }

    public function filteredBy(Specification $specification): array
    {
        return array_value(array_filter($this->sequence, function(int $num) use ($specification) {
            return $specification->isSatisfiedBy($num);
        }));
    }
}
```

NaturalSequenceを用い「1000未満の自然数の数列」を表すには

```
$sequence = new NaturalSequence(1000);
```

というようにします。
