<h1>Advices List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Slug</th>
      <th>Rating</th>
      <th>Description</th>
      <th>Instruction</th>
      <th>Created at</th>
      <th>Active</th>
      <th>Movie</th>
      <th>Level</th>
      <th>Visited</th>
      <th>Title</th>
      <th>Category</th>
      <th>Category upcategory</th>
      <th>User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Advices as $Advice): ?>
    <tr>
      <td><a href="<?php echo url_for('advice/show?id='.$Advice->getId()) ?>"><?php echo $Advice->getId() ?></a></td>
      <td><?php echo link_to($Advice->getTitleSlug(), 'show_advice', $Advice) ?></td>
      <td><?php echo $Advice->getSlug() ?></td>
      <td><?php echo $Advice->getRating() ?></td>
      <td><?php echo $Advice->getDescription() ?></td>
      <td><?php echo $Advice->getInstruction() ?></td>
      <td><?php echo $Advice->getCreatedAt() ?></td>
      <td><?php echo $Advice->getActive() ?></td>
      <td><?php echo $Advice->getMovie() ?></td>
      <td><?php echo $Advice->getLevel() ?></td>
      <td><?php echo $Advice->getVisited() ?></td>
      <td><?php echo $Advice->getTitle() ?></td>
      <td><?php echo $Advice->getCategoryId() ?></td>
      <td><?php echo $Advice->getCategoryUpcategoryId() ?></td>
      <td><?php echo $Advice->getUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('advice/new') ?>">New</a>
