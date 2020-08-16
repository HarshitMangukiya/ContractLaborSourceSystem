using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;
public partial class register : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite14\App_Data\online.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();
    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connction");
        }
        display();
        dropdownfill();
        displaycategory();
    }
    public void display()
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure3", con);
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
        //Response.Write("display record");

    }
    public void displaycategory()
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure8", con);
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView2.DataSource = ds;
        GridView2.DataBind();
        //Response.Write("display record");

    }
    public void dropdownfill()
    {
        adp = new SqlDataAdapter("StoredProcedure8", con);
        ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        for (int i = 0; i < ds.Tables[0].Rows.Count; i++)
        {
            string category = ds.Tables[0].Rows[i][0].ToString();
            DropDownList1.Items.Add(category);
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        String f_name = FileUpload1.FileName;
        FileUpload1.SaveAs(Server.MapPath("./image/" + f_name));

        Image1.ImageUrl = "./image/" + f_name;

        SqlCommand cmd = new SqlCommand("StoredProcedure5", con);
        cmd.Parameters.AddWithValue("@var1", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var2", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var3",TextBox3.Text);
        cmd.Parameters.AddWithValue("@var4", Image1.ImageUrl);
        cmd.Parameters.AddWithValue("@var5", TextBox4.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        display();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        String f_name = FileUpload1.FileName;
        FileUpload1.SaveAs(Server.MapPath("./image/" + f_name));

        Image1.ImageUrl = "./image/" + f_name;

        SqlCommand cmd = new SqlCommand("StoredProcedure6", con);
        cmd.Parameters.AddWithValue("@var1", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var2", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var3", TextBox3.Text);
        cmd.Parameters.AddWithValue("@var4", Image1.ImageUrl);
        cmd.Parameters.AddWithValue("@var5", TextBox4.Text);
        cmd.Parameters.AddWithValue("@var6", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        display();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure7", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure9", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
        Response.Write("search record");
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = GridView1.SelectedRow.Cells[1].Text;
        DropDownList1.SelectedValue = GridView1.SelectedRow.Cells[2].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[3].Text;
        TextBox3.Text = GridView1.SelectedRow.Cells[4].Text;
        TextBox4.Text = GridView1.SelectedRow.Cells[6].Text;

    }
}