<table>
  <tbody>
    <tr>
      <th>Autor</th>
      <td><?php echo $author->getUserName() ?></td>
    </tr>

    <tr>
      <th>Id:</th>
      <td><?php echo $advice->getId() ?></td>
    </tr>
    <tr>
      <th>Slug:</th>
      <td><?php echo $advice->getSlug() ?></td>
    </tr>
    <tr>
      <th>Rating:</th>
      <td><?php echo $advice->getRating() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $advice->getDescription() ?></td>
    </tr>
    <tr>
      <th>Instruction:</th>
      <td><?php echo $advice->getInstruction() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo date("d.m.Y", strtotime($advice->getCreatedAt())) ?></td>

    </tr>
    <tr>
      <th>Active:</th>
      <td><?php echo $advice->getActive() ?></td>
    </tr>
    <tr>
      <th>Movie:</th>
      <td><?php echo $advice->getMovie() ?></td>
    </tr>
    <tr>
      <th>Level:</th>
      <td><?php echo $advice->getLevel() ?></td>
    </tr>
    <tr>
      <th>Visited:</th>
      <td><?php echo $advice->getVisited() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $advice->getTitle() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $advice->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Category upcategory:</th>
      <td><?php echo $advice->getCategoryUpcategoryId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $advice->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('advice/edit?id='.$advice->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('advice/index') ?>">List</a>
