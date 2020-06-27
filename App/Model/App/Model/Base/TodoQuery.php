<?php

namespace App\Model\App\Model\Base;

use \Exception;
use \PDO;
use App\Model\App\Model\Todo as ChildTodo;
use App\Model\App\Model\TodoQuery as ChildTodoQuery;
use App\Model\App\Model\Map\TodoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'todo' table.
 *
 *
 *
 * @method     ChildTodoQuery orderByTodoindex($order = Criteria::ASC) Order by the todoIndex column
 * @method     ChildTodoQuery orderByUname($order = Criteria::ASC) Order by the uname column
 * @method     ChildTodoQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildTodoQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildTodoQuery orderByDateofcreation($order = Criteria::ASC) Order by the dateOfCreation column
 *
 * @method     ChildTodoQuery groupByTodoindex() Group by the todoIndex column
 * @method     ChildTodoQuery groupByUname() Group by the uname column
 * @method     ChildTodoQuery groupByTitle() Group by the title column
 * @method     ChildTodoQuery groupByContent() Group by the content column
 * @method     ChildTodoQuery groupByDateofcreation() Group by the dateOfCreation column
 *
 * @method     ChildTodoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTodoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTodoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTodoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTodoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTodoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTodoQuery leftJoinLogin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Login relation
 * @method     ChildTodoQuery rightJoinLogin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Login relation
 * @method     ChildTodoQuery innerJoinLogin($relationAlias = null) Adds a INNER JOIN clause to the query using the Login relation
 *
 * @method     ChildTodoQuery joinWithLogin($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Login relation
 *
 * @method     ChildTodoQuery leftJoinWithLogin() Adds a LEFT JOIN clause and with to the query using the Login relation
 * @method     ChildTodoQuery rightJoinWithLogin() Adds a RIGHT JOIN clause and with to the query using the Login relation
 * @method     ChildTodoQuery innerJoinWithLogin() Adds a INNER JOIN clause and with to the query using the Login relation
 *
 * @method     \App\Model\App\Model\LoginQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTodo findOne(ConnectionInterface $con = null) Return the first ChildTodo matching the query
 * @method     ChildTodo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTodo matching the query, or a new ChildTodo object populated from the query conditions when no match is found
 *
 * @method     ChildTodo findOneByTodoindex(int $todoIndex) Return the first ChildTodo filtered by the todoIndex column
 * @method     ChildTodo findOneByUname(string $uname) Return the first ChildTodo filtered by the uname column
 * @method     ChildTodo findOneByTitle(string $title) Return the first ChildTodo filtered by the title column
 * @method     ChildTodo findOneByContent(string $content) Return the first ChildTodo filtered by the content column
 * @method     ChildTodo findOneByDateofcreation(string $dateOfCreation) Return the first ChildTodo filtered by the dateOfCreation column *

 * @method     ChildTodo requirePk($key, ConnectionInterface $con = null) Return the ChildTodo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTodo requireOne(ConnectionInterface $con = null) Return the first ChildTodo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTodo requireOneByTodoindex(int $todoIndex) Return the first ChildTodo filtered by the todoIndex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTodo requireOneByUname(string $uname) Return the first ChildTodo filtered by the uname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTodo requireOneByTitle(string $title) Return the first ChildTodo filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTodo requireOneByContent(string $content) Return the first ChildTodo filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTodo requireOneByDateofcreation(string $dateOfCreation) Return the first ChildTodo filtered by the dateOfCreation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTodo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTodo objects based on current ModelCriteria
 * @method     ChildTodo[]|ObjectCollection findByTodoindex(int $todoIndex) Return ChildTodo objects filtered by the todoIndex column
 * @method     ChildTodo[]|ObjectCollection findByUname(string $uname) Return ChildTodo objects filtered by the uname column
 * @method     ChildTodo[]|ObjectCollection findByTitle(string $title) Return ChildTodo objects filtered by the title column
 * @method     ChildTodo[]|ObjectCollection findByContent(string $content) Return ChildTodo objects filtered by the content column
 * @method     ChildTodo[]|ObjectCollection findByDateofcreation(string $dateOfCreation) Return ChildTodo objects filtered by the dateOfCreation column
 * @method     ChildTodo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TodoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Model\App\Model\Base\TodoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Model\\App\\Model\\Todo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTodoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTodoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTodoQuery) {
            return $criteria;
        }
        $query = new ChildTodoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTodo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TodoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TodoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTodo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT todoIndex, uname, title, content, dateOfCreation FROM todo WHERE todoIndex = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTodo $obj */
            $obj = new ChildTodo();
            $obj->hydrate($row);
            TodoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTodo|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TodoTableMap::COL_TODOINDEX, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TodoTableMap::COL_TODOINDEX, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the todoIndex column
     *
     * Example usage:
     * <code>
     * $query->filterByTodoindex(1234); // WHERE todoIndex = 1234
     * $query->filterByTodoindex(array(12, 34)); // WHERE todoIndex IN (12, 34)
     * $query->filterByTodoindex(array('min' => 12)); // WHERE todoIndex > 12
     * </code>
     *
     * @param     mixed $todoindex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByTodoindex($todoindex = null, $comparison = null)
    {
        if (is_array($todoindex)) {
            $useMinMax = false;
            if (isset($todoindex['min'])) {
                $this->addUsingAlias(TodoTableMap::COL_TODOINDEX, $todoindex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($todoindex['max'])) {
                $this->addUsingAlias(TodoTableMap::COL_TODOINDEX, $todoindex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TodoTableMap::COL_TODOINDEX, $todoindex, $comparison);
    }

    /**
     * Filter the query on the uname column
     *
     * Example usage:
     * <code>
     * $query->filterByUname('fooValue');   // WHERE uname = 'fooValue'
     * $query->filterByUname('%fooValue%', Criteria::LIKE); // WHERE uname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByUname($uname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TodoTableMap::COL_UNAME, $uname, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TodoTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%', Criteria::LIKE); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TodoTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the dateOfCreation column
     *
     * Example usage:
     * <code>
     * $query->filterByDateofcreation('2011-03-14'); // WHERE dateOfCreation = '2011-03-14'
     * $query->filterByDateofcreation('now'); // WHERE dateOfCreation = '2011-03-14'
     * $query->filterByDateofcreation(array('max' => 'yesterday')); // WHERE dateOfCreation > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateofcreation The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function filterByDateofcreation($dateofcreation = null, $comparison = null)
    {
        if (is_array($dateofcreation)) {
            $useMinMax = false;
            if (isset($dateofcreation['min'])) {
                $this->addUsingAlias(TodoTableMap::COL_DATEOFCREATION, $dateofcreation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateofcreation['max'])) {
                $this->addUsingAlias(TodoTableMap::COL_DATEOFCREATION, $dateofcreation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TodoTableMap::COL_DATEOFCREATION, $dateofcreation, $comparison);
    }

    /**
     * Filter the query by a related \App\Model\App\Model\Login object
     *
     * @param \App\Model\App\Model\Login|ObjectCollection $login The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTodoQuery The current query, for fluid interface
     */
    public function filterByLogin($login, $comparison = null)
    {
        if ($login instanceof \App\Model\App\Model\Login) {
            return $this
                ->addUsingAlias(TodoTableMap::COL_UNAME, $login->getUname(), $comparison);
        } elseif ($login instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TodoTableMap::COL_UNAME, $login->toKeyValue('PrimaryKey', 'Uname'), $comparison);
        } else {
            throw new PropelException('filterByLogin() only accepts arguments of type \App\Model\App\Model\Login or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Login relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function joinLogin($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Login');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Login');
        }

        return $this;
    }

    /**
     * Use the Login relation Login object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Model\App\Model\LoginQuery A secondary query class using the current class as primary query
     */
    public function useLoginQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLogin($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Login', '\App\Model\App\Model\LoginQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTodo $todo Object to remove from the list of results
     *
     * @return $this|ChildTodoQuery The current query, for fluid interface
     */
    public function prune($todo = null)
    {
        if ($todo) {
            $this->addUsingAlias(TodoTableMap::COL_TODOINDEX, $todo->getTodoindex(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the todo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TodoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TodoTableMap::clearInstancePool();
            TodoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TodoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TodoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TodoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TodoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TodoQuery
