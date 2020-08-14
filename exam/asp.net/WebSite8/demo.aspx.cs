using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class demo : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite8\App_Data\db.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();
    //string gend = "male";
    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Closed || con.State == ConnectionState.Broken)
        {
           
            con.Open();
            Response.Write("connetion");
            fillgrid();
        }
    }

    public void fillgrid()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select * from tb1", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }


    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("insert into tb1 values('"+TextBox2.Text+"')",con);
        cmd.ExecuteNonQuery();
        Response.Write("insert data ");
        fillgrid();

    }
   
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = GridView1.SelectedRow.Cells[1].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[2].Text;
                
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {

    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("update tb1 set name='"+TextBox2.Text+"' where id='"+TextBox1.Text+"'",con);
        cmd.ExecuteNonQuery();
        Response.Write("update data"); ;
        fillgrid();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("delete from tb1 where id='"+TextBox1.Text+"'", con);
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        fillgrid();

    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataAdapter adp = new SqlDataAdapter("select * from tb1 where id='" + TextBox1.Text + "'", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
        //fillgrid();
    }
}