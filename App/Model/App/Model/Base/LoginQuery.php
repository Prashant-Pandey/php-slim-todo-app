<?php

namespace App\Model\App\Model\Base;

use \Exception;
use \PDO;
use App\Model\App\Model\Login as ChildLogin;
use App\Model\App\Model\LoginQuery as ChildLoginQuery;
use App\Model\App\Model\Map\LoginTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login' table.
 *
 *
 *
 * @method     ChildLoginQuery orderByLoginindex($order = Criteria::ASC) Order by the loginIndex column
 * @method     ChildLoginQuery orderByUname($order = Criteria::ASC) Order by the uname column
 * @method     ChildLoginQuery orderByPass($order = Criteria::ASC) Order by the pass column
 *
 * @method     ChildLoginQuery groupByLoginindex() Group by the loginIndex column
 * @method     ChildLoginQuery groupByUname() Group by the uname column
 * @method     ChildLoginQuery groupByPass() Group by the pass column
 *
 * @method     ChildLoginQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLoginQuery leftJoinTodo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Todo relation
 * @method     ChildLoginQuery rightJoinTodo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Todo relation
 * @method     ChildLoginQuery innerJoinTodo($relationAlias = null) Adds a INNER JOIN clause to the query using the Todo relation
 *
 * @method     ChildLoginQuery joinWithTodo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Todo relation
 *
 * @method     ChildLoginQuery leftJoinWithTodo() Adds a LEFT JOIN clause and with to the query using the Todo relation
 * @method     ChildLoginQuery rightJoinWithTodo() Adds a RIGHT JOIN clause and with to the query using the Todo relation
 * @method     ChildLoginQuery innerJoinWithTodo() Adds a INNER JOIN clause and with to the query using the Todo relation
 *
 * @method     \App\Model\App\Model\TodoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLogin findOne(ConnectionInterface $con = null) Return the first ChildLogin matching the query
 * @method     ChildLogin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLogin matching the query, or a new ChildLogin object populated from the query conditions when no match is found
 *
 * @method     ChildLogin findOneByLoginindex(int $loginIndex) Return the first ChildLogin filtered by the loginIndex column
 * @method     ChildLogin findOneByUname(string $uname) Return the first ChildLogin filtered by the uname column
 * @method     ChildLogin findOneByPass(string $pass) Return the first ChildLogin filtered by the pass column *

 * @method     ChildLogin requirePk($key, ConnectionInterface $con = null) Return the ChildLogin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOne(ConnectionInterface $con = null) Return the first ChildLogin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogin requireOneByLoginindex(int $loginIndex) Return the first ChildLogin filtered by the loginIndex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByUname(string $uname) Return the first ChildLogin filtered by the uname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByPass(string $pass) Return the first ChildLogin filtered by the pass column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLogin objects based on current ModelCriteria
 * @method     ChildLogin[]|ObjectCollection findByLoginindex(int $loginIndex) Return ChildLogin objects filtered by the loginIndex column
 * @method     ChildLogin[]|ObjectCollection findByUname(string $uname) Return ChildLogin objects filtered by the uname column
 * @method     ChildLogin[]|ObjectCollection findByPass(string $pass) Return ChildLogin objects filtered by the pass column
 * @method     ChildLogin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Model\App\Model\Base\LoginQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Model\\App\\Model\\Login', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLoginQuery) {
            return $criteria;
        }
        $query = new ChildLoginQuery();
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
     * @return ChildLogin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLogin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT loginIndex, uname, pass FROM login WHERE loginIndex = :p0';
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
            /** @var ChildLogin $obj */
            $obj = new ChildLogin();
            $obj->hydrate($row);
            LoginTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLogin|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginTableMap::COL_LOGININDEX, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginTableMap::COL_LOGININDEX, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the loginIndex column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginindex(1234); // WHERE loginIndex = 1234
     * $query->filterByLoginindex(array(12, 34)); // WHERE loginIndex IN (12, 34)
     * $query->filterByLoginindex(array('min' => 12)); // WHERE loginIndex > 12
     * </code>
     *
     * @param     mixed $loginindex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByLoginindex($loginindex = null, $comparison = null)
    {
        if (is_array($loginindex)) {
            $useMinMax = false;
            if (isset($loginindex['min'])) {
                $this->addUsingAlias(LoginTableMap::COL_LOGININDEX, $loginindex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($loginindex['max'])) {
                $this->addUsingAlias(LoginTableMap::COL_LOGININDEX, $loginindex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_LOGININDEX, $loginindex, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByUname($uname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_UNAME, $uname, $comparison);
    }

    /**
     * Filter the query on the pass column
     *
     * Example usage:
     * <code>
     * $query->filterByPass('fooValue');   // WHERE pass = 'fooValue'
     * $query->filterByPass('%fooValue%', Criteria::LIKE); // WHERE pass LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pass The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPass($pass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pass)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_PASS, $pass, $comparison);
    }

    /**
     * Filter the query by a related \App\Model\App\Model\Todo object
     *
     * @param \App\Model\App\Model\Todo|ObjectCollection $todo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLoginQuery The current query, for fluid interface
     */
    public function filterByTodo($todo, $comparison = null)
    {
        if ($todo instanceof \App\Model\App\Model\Todo) {
            return $this
                ->addUsingAlias(LoginTableMap::COL_UNAME, $todo->getUname(), $comparison);
        } elseif ($todo instanceof ObjectCollection) {
            return $this
                ->useTodoQuery()
                ->filterByPrimaryKeys($todo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTodo() only accepts arguments of type \App\Model\App\Model\Todo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Todo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function joinTodo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Todo');

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
            $this->addJoinObject($join, 'Todo');
        }

        return $this;
    }

    /**
     * Use the Todo relation Todo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Model\App\Model\TodoQuery A secondary query class using the current class as primary query
     */
    public function useTodoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTodo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Todo', '\App\Model\App\Model\TodoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLogin $login Object to remove from the list of results
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function prune($login = null)
    {
        if ($login) {
            $this->addUsingAlias(LoginTableMap::COL_LOGININDEX, $login->getLoginindex(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginTableMap::clearInstancePool();
            LoginTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LoginQuery
