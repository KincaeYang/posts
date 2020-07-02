### 文章列表的实现



#### 分页的使用



```php
# 使用paginate()可以分页，参数为每页显示数据条数

$posts = Post::orderBy('created_at','desc')->paginate(5);
return view('post/index',compact('posts'));

# 页面渲染;links包含了所有要跳转的链接

{{ $posts->links() }}
```





#### 字符串截取

```php
Str::limit(
    参一：字符串，
	参二：截取长度，
    参三：代替的字符串
)
```





#### HTTP 419

> 419：认证超时；表示以前认证失效。出现这个问题参考 csrf验证是否通过。



```php
# 方法一：在表单中添加这句
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    
# 方法二：在表单中添加这句
{{ csrf_field() }}
```



#### 巧用黑名单

> 创建一个模型基类，设置黑名单为空 protected $guarded = [] ; 在使用 create() 添加数据时可插入任意数据。后面的模型类只要继承即可使用。

```php
# basemodel

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    //不可注入的字段;根据业务逻辑可自行修改
    protected $guarded = [];
}
```



```php
# post模型

<?php

namespace App\Models;

use App\Models\BaseModel;

class Post extends BaseModel
{

}

```



#### 富文本内容“原生”页面渲染

> 为了保证格式，数据库中存的都是带标签的内容。

```php
# 外面不需要嵌套标签
{!! 数据 !!}
```



### 核心思想



#### 服务容器

Laravel的一个核心，就是**服务容器**。容器就是用来装东西的；将物体放在一个容器中，等需要用的时候再去拿。将需要用的类放在服务容器中，就是**绑定（bind / singleton）**。需要是取出来就是**解耦（make）**。这点依赖于IOC即**控制反转**。目的就是为了降低代码的耦合度，借助第三方实现具有依赖关系的解耦。



#### orm关系理解

```php
# 背景：

user模型（用户表）和fans模型（粉丝表）

fans模型中与user模型通过fan_id和start_id进行关联

在user模型中建立了fans和start一对多的方法；且在fans模型中建立了fuser和suser一对一的方法。

# 结论：

模型与模型之间的关系并非要固定匹配

例如：
    user模型和fans模型之间通过fans()方法，在user模型中建立的一对多的关系。但是在fans模型中，并没有直接使用belongsTo去迎合这个关系。orm关系可以即用即加载。
```





